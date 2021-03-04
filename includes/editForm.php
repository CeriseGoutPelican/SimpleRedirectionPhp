<section class="w-full px-8 py-16 bg-white xl:px-8">
    <div class="max-w-5xl mx-auto">

    	<form action="./actions.php<?= isset($_GET['k'])?'?v=edit&k='.$_GET['k']:'?v=add'; ?>" method="post">
    		
    		<div class="flex mb-6">
			    <label for="key" class="text-sm border border-2 rounded-l-lg px-4 py-2 bg-blue-100 text-blue-600 whitespace-nowrap">Key (without spaces or special characters) :</label>
			    <input value="<?= isset($_GET['k'])?$_GET['k']:'' ?>" name="key" class="border border-2 border-blue-200 rounded-r-lg px-4 py-2 w-full focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-offset-blue-200" type="text" placeholder="google" />
			</div>

    		<div class="flex mb-6">
			    <label for="url" class="text-sm border border-2 rounded-l-lg px-4 py-2 bg-blue-100 text-blue-600 whitespace-nowrap">URL :</label>
			    <input value="<?= isset($_GET['k'])&&isset($json[$_GET['k']])?$json[$_GET['k']]['url']:'' ?>" name="url" class="border border-2 border-blue-200 rounded-r-lg px-4 py-2 w-full focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-offset-blue-200" type="url" placeholder="https://google.com/" />
			</div>

    		<div class="flex mb-6">
			    <label for="count" class="text-sm border border-2 rounded-l-lg px-4 py-2 bg-blue-100 text-blue-600 whitespace-nowrap">Clics :</label>
			    <input value="<?= isset($_GET['k'])&&isset($json[$_GET['k']])?$json[$_GET['k']]['count']:'0' ?>" name="count" class="border border-2 border-blue-200 rounded-r-lg px-4 py-2 w-full focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-offset-blue-200" type="number" placeholder="234" />
			</div>

			<button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-offset-blue-200">Save</button>

    	</form>

    </div>
</section>