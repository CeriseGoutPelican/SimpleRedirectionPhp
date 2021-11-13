<?php 
	$dates = lastXDays(30);
 ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<section class="w-full px-8 py-16 bg-white xl:px-8">
    <div class="max-w-5xl mx-auto">

        <div class="block lg:flex">
            
            <div class="flex-auto">
                <h2 class="mb-5 lg:mb-0 text-xl font-extrabold leading-none text-black sm:text-2xl md:text-4xl">
                    Show statistics for "<?= isset($_GET['k'])?h($_GET['k']):'' ?>"
                </h2>
            </div>
            <div class="flex-none">
                <a href="<?= $url ?>" class="inline-flex items-center justify-center px-6 py-3 text-lg font-medium leading-tight text-blue-500 whitespace-no-wrap border border-blue-300 rounded-full shadow-sm bg-blue-50 hover:bg-white hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200">
                    Back to home
                </a>
            </div>

        </div>

        <div class="my-6">

			<div class="shadow-lg rounded-lg overflow-hidden">
				<div class="py-3 px-5 bg-gray-50">
					Total number of clicks for "<?= isset($_GET['k'])?h($_GET['k']):'' ?>" : <?php echo $json[$_GET['k']]['count'] ?>
				</div>
				<canvas class="p-10" id="chartLine"></canvas>
			</div>

			<!-- Chart line -->
			<script>
			  const labels = [<?= arrayToJsList($dates) ?>];
			  const data = {
			    labels: labels,
			    datasets: [
			      {
			        label: "Redirections",
			        backgroundColor: "hsl(217, 91%, 60%)",
			        borderColor: "hsl(217, 91%, 60%)",
			        data: [<?= arrayToJsList(statistics_data_day($dates, $json[$_GET['k']]['statistics'])) ?>],
			      },
			    ],
			  };

			  const configLineChart = {
			    type: "line",
			    data,
			    options: {},
			  };

			  var chartLine = new Chart(
			    document.getElementById("chartLine"),
			    configLineChart
			  );
			</script>

		</div>

		<div class="my-6">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-xl overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white text-sm md:text-base uppercase">
                     
                    <tr class="bg-blue-500 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-4 sm:mb-0">
                        <th class="p-3 text-left h-14 md:h-auto">Date & time</th>
                        <th class="p-3 text-left h-14 md:h-auto">IP Adress</th>
                        <th class="p-3 text-left h-16 md:h-auto">Actions</th>
                    </tr>

                </thead>
                <tbody class="flex-1 sm:flex-none">
                    <?php foreach ($json[$_GET['k']]['logs'] as $time => $ip): ?>
                    <tr class="md:hover:bg-gray-50 border-b border-gray-200 flex flex-col flex-no wrap sm:table-row mb-4 sm:mb-0">
                        <td class="p-3 hover:bg-gray-50 h-14 md:h-auto">
                            <?= date('d M, H:i', $time) ?>
                        </td>
                        
                        <td class="p-3 hover:bg-gray-50 h-14 md:h-auto">
                            <?= h($ip) ?>
                        </td>
                        <td class="p-3 hover:bg-gray-50 h-16 md:h-auto h-16 md:h-auto">
                            <div class="flex item-center justify-center">
                            
                                <a href="https://whatismyipaddress.com/ip/<?= h($ip) ?>" target="_blank" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110 bg-blue-100 p-2 w-10 h-10 rounded-full focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-blue-200">
                                	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                		<circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                	</svg>
                                </a>

                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>  
                </tbody>
            </table> 
		</div>

	</div>
</section>