<?php
require_once('Core/Init.php');
$user = new User();
$directory = new Directorycreator();
$property = new Property();

if(!$user->isloggedin()){
    Redirect::to(BASE_URL);
}elseif((int)$user->data()->role !== USER_ROLE_AGENT){
    Redirect::to('404');
}else{
    if(Input::exists()){
        //check for token to protect against csrf.
        // get all the input and perform validation on them
        if(Token::check(Input::get('token'))){
        
            $data =[];

            $address = Input::get('address') ;
            $city = Input::get('city');
            $state = Input::get('state');
            $lga = Input::get('lga');
            $type = Input::get('type');
            $status = Input::get('status');
            $purpose = Input::get('purpose');
            $price = Input::get('price');
            $description = Input::get('description');
            $bedrooms = Input::get('bedrooms');
            $bathrooms = Input::get('bathrooms');
            $toilets = Input::get('toilets');
            $is_available = (Input::get('is_available') === 'on')? 1 : 0;
            $user_id = session::get('user');
            $user_role = session::get('user_role');
            //the field to update with the user id for either landlord or agent will depend on the user role, 
            $field_name = ($user_role == 4) ? 'agent_id' : (($user_role == 5) ? 'landlord_id' : null);
            $profile_pic = (Input::get('profile-pic'))? Input::get('profile-pic') : null;
            $image2 = (Input::get('image2'))? Input::get('image2') : null;
            $image3 = (Input::get('image3'))? Input::get('image3') : null;
            $image4 = (Input::get('image4'))? Input::get('image4') : null;
            $image5 = (Input::get('image5'))? Input::get('image5') : null;
            $image6 = (Input::get('image6'))? Input::get('image6') : null;



            


            $data['address'] = $address;
            $data['city'] = $city;
            $data['state'] = $state;
            $data['lga'] = $lga;
            $data['type'] = $type;
            $data['status'] = $status;
            $data['purpose'] = $purpose;
            $data['price'] = $price;
            $data['description'] = $description;
            $data['bedrooms'] = $bedrooms;
            $data['bathrooms'] = $bathrooms;
            $data['toilets'] = $toilets;
            $data['is_available'] = $is_available;
            //$data['profile-pic'] = $profile_pic;
            
    
            $rules = [
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'lga' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'status' => 'required|string|max:255',
                'purpose' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'bedrooms' => 'required|numeric',
                'bathrooms' => 'required|numeric',
                'toilets' => 'required|numeric',
                'is_available' => 'nullable|boolean',
                //'profile-pic' => 'required|image'
            ];
    

            $validate = new Validator($data);
            $result = $validate->validate($rules);
            if ($validate->passes()){
                        //this new property method will create a new record in the property table of the database

                $property_id  = Hash::generate_unique_id(10, $user_id);
                $path =[];
                foreach ($_FILES as $fieldName => $file) {
                    // The imageupload class has been built to rename the images with the $fieldName which is usually
                    // the name of the field being uploaded.
                    //this only works when it is known beforehand, which picture is being uploaded
        
            
                    //$source = $fieldName; it is property name here. when uploading profile pics then profile pics would be used
                    try {
                        $folder = $directory->createdirectory('/uploads/', 'property/', $user_id, $property_id);
                        //the $objectid of the user would be used to create the folder where the user's pics would be
                        //uploaded into
        
                        // here the image is uploaded
                        $upload = new ImageUploader($folder);
                        $path[$fieldName] = $upload->upload($file, $fieldName);
                
        
                    } catch (Exception $e) {
                        Session::flash('failure_message', $e->getMessage());
                    }
            
                }

                //here the database is updated so you can use the new_property method of the property class.
                // the url for each image uploaded. is returned in the $path array as $fieldName => $folder.'/'fieldName
                //next we encode this path as a json object and store it in the url field 
                //$connection->insert('property', array('name' => $path));

                $json_object = json_encode($path);
                $details = [
                    "address" => $address,
                    "city" => $city,
                    "state" => $state,
                    "lga" => $lga,
                    "type" => $type,
                    "status" => $status,
                    "purpose" => $purpose,
                    "price" => $price,
                    "description" => $description,
                    "bedrooms" => $bedrooms,
                    "bathrooms" => $bathrooms,
                    "toilets" => $toilets,
                    "images" => $json_object,
                    "is_available" => $is_available,
                    $field_name => $user_id,
                    "property_id" => $property_id
                ];
                $property->new_property($details);

            }else{
                foreach($validate->errors() as $error){

                }
            }




        }
    }
}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>File Upload Form</title>
	<style>
		body {
			background-color: #f8f8f8;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		h1 {
			color: #333;
			margin: 20px 0;
			text-align: center;
		}
		form {
			background-color: #fff;
			border: 1px solid #ccc;
			margin: 0 auto;
			max-width: 600px;
			padding: 20px;
		}
		label {
			display: block;
			font-weight: bold;
			margin: 10px 0;
		}
		input[type="text"],
		input[type="number"],
		textarea {
			border: 1px solid #ccc;
			box-sizing: border-box;
			font-size: 16px;
			padding: 10px;
			width: 100%;
		}
		input[type="checkbox"] {
			margin: 10px 5px 10px 0;
			vertical-align: middle;
		}
		input[type="file"] {
			display: block;
			margin: 10px 0;
		}
		input[type="submit"] {
			background-color: #008CBA;
			border: none;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px;
			margin-top: 10px;
			width: 100%;
		}
		input[type="submit"]:hover {
			background-color: #005f79;
		}
	</style>
</head>
<body>
<div class="alert">
  <?php if(session::exists('message')): ?>
    <?php echo session::flash('message'); ?>
  <?php endif; ?>
</div>

	<h1>File Upload Form</h1>
	<form method="post" action="" enctype="multipart/form-data">
    <label for="address">Address:</label>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <input type="text" id="address" name="address" value ="<?php echo Input::get('address') ? Input::get('address') : '';?>" >
    <label for="city">City:</label>
    <input type="text" id="city" name="city" value ="<?php echo Input::get('city') ? Input::get('city') : '';?>" >
    <label for="state">State:</label>
    <input type="text" id="state" name="state" value ="<?php echo Input::get('state') ? Input::get('state') : '';?>" >
    <label for="lga">LGA:</label>
    <input type="text" id="lga" name="lga" value ="<?php echo Input::get('lga') ? Input::get('lga') : '';?>" >
    <label for="type">Type:</label>
    <input type="text" id="type" name="type" value ="<?php echo Input::get('type') ? Input::get('type') : '';?>" >
    <label for="status">Status:</label>
    <input type="text" id="status" name="status" value ="<?php echo Input::get('status') ? Input::get('status') : '';?>" >
    <label for="purpose">Purpose:</label>
    <input type="text" id="purpose" name="purpose" value ="<?php echo Input::get('purpose') ? Input::get('purpose') : '';?>" >
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value ="<?php echo Input::get('price') ? Input::get('price') : '';?>" >
    <label for="description">Description:</label>
    <textarea id="description" name="description" value ="<?php echo Input::get('description') ? Input::get('description') :'';?>" ></textarea>
    <label for="bedrooms">number of Bedrooms:</label>
    <input type="number" id="bedrooms" name="bedrooms" value ="<?php echo Input::get('bedrooms') ? Input::get('bedrooms') : '';?>" >
    <label for="bathrooms">number of Bathrooms:</label>
    <input type="number" id="bathrooms" name="bathrooms" value ="<?php echo Input::get('bathrooms') ? Input::get('bathrooms') : '';?>" >
    <label for="toilets">number of Toilets:</label>
    <input type="number" id="toilets" name="toilets" value ="<?php echo Input::get('toilets') ? Input::get('toilets') : '';?>" >
    <label for="is_available">Is Available:</label>
    <input type="checkbox" id="is_available" name="is_available"  >
    <label for="profile-pic">Profile Pic:</label>
    <input type="file" name="profile-pic" accept="image/*">
    <label for="bedroom-pic">Bedroom Pic:</label>
    <input type="file" name="bedroom-pic" accept="image/*">
    <label for="parlor-pic">Parlor Pic:</label>
    <input type="file" name="parlor-pic" accept="image/*">
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Submit">
    
</form>
<script>
  // Wait for 3 seconds before removing the flash message
  setTimeout(function() {
    var message = document.querySelector('.alert');
    if (message) {
      message.parentNode.removeChild(message);
    }
  }, 3000);
</script>

</body>
</html>

