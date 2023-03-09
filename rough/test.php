<!DOCTYPE html>
<html>
<head>
	<title>Example Form</title>
</head>
<body>
	<h2>Example Form</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name"><br>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email"><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password"><br>

		<label for="phone">Phone:</label>
		<input type="tel" name="phone" id="phone"><br>

		<label for="age">Age:</label>
		<input type="number" name="age" id="age"><br>

		<label for="gender">Gender:</label>
		<select name="gender" id="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>
		</select><br>

		<label for="address">Address:</label>
		<textarea name="address" id="address"></textarea><br>

		<label for="city">City:</label>
		<input type="text" name="city" id="city"><br>

		<label for="state">State:</label>
		<input type="text" name="state" id="state"><br>

		<label for="zip">Zip Code:</label>
		<input type="text" name="zip" id="zip"><br>

		<input type="submit" name="submit" value="Submit">
	</form>

	<?php
    require_once 'Core/Init.php';

    $data = [];

    if (Input::exists()) {
        $name = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');
        $phone = Input::get('phone');
        $age = Input::get('age');
        $gender = Input::get('gender');
        $address = Input::get('address');
        $city = Input::get('city');
        $state = Input::get('state');
        $zip = Input::get('zip');
        
        // Store the values in the $data array
        $data['name'] = $name;
        $data['email'] = $email;
        $data['password'] = $password;
        $data['phone'] = $phone;
        $data['age'] = $age;
        $data['gender'] = $gender;
        $data['address'] = $address;
        $data['city'] = $city;
        $data['state'] = $state;
        $data['zip'] = $zip;
        
        $rules = [
            'name' => 'required|string|max:255',
            //'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer|min:18|max:120',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
        ];
	$validator = new Validator($data);
    $result = $validator->validate($rules);

    if($result->fails()) {
        $errors = $result->errors();
        // handle errors
    } else {
        // data is valid, do something
    }
        }
	?>
</body>
</html>
