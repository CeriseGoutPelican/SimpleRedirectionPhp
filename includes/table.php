<section class="w-full px-8 py-16 bg-white xl:px-8">
	<div class="max-w-5xl mx-auto">
		
        <div class="block lg:flex">
            
            <div class="flex-auto">
                <h2 class="mb-5 lg:mb-0 text-xl font-extrabold leading-none text-black sm:text-2xl md:text-4xl">
                    Manage your redirections
                </h2>
            </div>
            <div class="flex-none">
                <a href="<?= $url ?>actions.php?v=add" class="inline-flex items-center justify-center px-6 py-3 text-lg font-medium leading-tight text-blue-500 whitespace-no-wrap border border-blue-300 rounded-full shadow-sm bg-blue-50 hover:bg-white hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200">
                    New redirection
                </a>
            </div>

        </div>

        <div class="my-6">

            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-xl overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white text-sm md:text-base uppercase">
                    <?php for ($i=0; $i < count($json); $i++): ?>
                         
                        <tr class="bg-blue-500 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-4 sm:mb-0">
                            <th class="p-3 text-left h-14 md:h-auto">Date</th>
                            <th class="p-3 text-left h-14 md:h-auto">Key</th>
                            <th class="p-3 text-left h-14 md:h-auto">Clics</th>
                            <th class="p-3 text-left h-14 md:h-auto">URL</th>
                            <th class="p-3 text-left h-16 md:h-auto">Actions</th>
                        </tr>

                     <?php endfor; ?>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    <?php foreach ($json as $k => $v): ?>
                    <tr class="md:hover:bg-gray-50 border-b border-gray-200 flex flex-col flex-no wrap sm:table-row mb-4 sm:mb-0">
                        <td class="p-3 hover:bg-gray-50 h-14 md:h-auto">
                            <?= date('m/d/Y', $v['time']) ?>
                        </td>
                        <td class="p-3 hover:bg-gray-50 h-14 md:h-auto ">
                            <a target="_blank" href="<?= $url.$k ?>" class="p-2 border-b-2 border-gray-300 hover:border-gray-500 border-dotted focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-gray-200"><?= $k ?></a>
                        </td>
                        <td class="p-3 hover:bg-gray-50 h-14 md:h-auto">
                            <?= $v['count'] ?>
                        </td>
                        <td class="p-3 truncate overflow-clip overflow-hidden  hover:bg-gray-50 h-14 md:h-auto">
                            <?= $v['url'] ?>
                        </td>
                        <td class="hover:bg-gray-50 h-16 md:h-auto h-16 md:h-auto" style="max-width: 220px;">
                            <div class="flex item-center justify-center">
                            
                                <a href="<?= $url ?>actions.php?v=statistics&k=<?= $k ?>" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110 bg-blue-100 p-2 w-10 h-10 rounded-full focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-blue-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line>
                                        <line x1="6" y1="20" x2="6" y2="14"></line>
                                    </svg>
                                </a>
                                
                                <a href="<?= $url ?>actions.php?v=edit&k=<?= $k ?>" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110 bg-blue-100 p-2 w-10 h-10 rounded-full focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-blue-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>

                                <a href="<?= $url ?>actions.php?v=delete&k=<?= $k ?>" onclick="return confirm('Are you sure?')" class="w-4 h-4 mr-2 transform hover:text-red-500 hover:scale-110 bg-red-100 p-2 w-10 h-10 rounded-full focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-red-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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