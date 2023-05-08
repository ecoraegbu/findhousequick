<section class="px-8 pb-8">

	<div class="p-4 bg-white rounded-xl">

		<h1 class="text-gray-700 font-bold">New Message</h1>
		<!-- <div class="flex justify-between">

  <button class="px-6 py-2 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add User</button>

</div> -->

		<div class="flex flex-wrap flex-col md:flex-row gap-4">

			<div class="flex-1">

				<div class="mt-4">
					<h2 class="text-sm text-gray-400 font-bold mb-2">fill required fields</h2>



					<div class="mt-4">
						<label for="subject" class="text-sm text-gray-700 font-medium">Subject</label>
						<input type="text" id="subject" name="subject" placeholder="Subject" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
					</div>

					<div class="mt-4">
						<label for="message" class="text-sm text-gray-700 font-medium">Message</label>
						<textarea type="message" id="message" name="message" placeholder="Message" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary"></textarea>
					</div>



					<div class="mt-4">
						<label for="attachments" class="text-sm text-gray-700 font-medium">File Attachments</label>
						<input type="file" id="attachments" multiple name="attachments" class="text-sm border-2 border-gray-200 px-4 py-3 text-gray-700 rounded-lg w-full outline-none focus:border-primary">
					</div>

				</div>


				<div class="flex justify-between mt-6">

					<button class="px-6 py-3 mt-4 text-white text-sm rounded-lg bg-primary font-medium hover:bg-blue-600">Add New User</button>
					<button class="px-6 py-3 mt-4 text-primary text-sm rounded-lg bg-gray-200 font-medium hover:bg-gray-300">Cancel</button>


				</div>



			</div>
		</div>


	</div>


</section>

<script>
	let myDropzone = new Dropzone("#dropzone", {
		url: "/file/post"
	});
</script>