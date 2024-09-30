<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mycom</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <?php include '../inc/header.php' ?>
    <section class="bg-center bg-no-repeat bg-cover bg-gray-600 bg-blend-multiply" style="background-image: url('../assets/img/walpaper_background.png'); height: 600px; ">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Documenting Fungi Diversity
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">We are creating a database that uses technology and research to catalog various fungi species found in diverse environments and support sustainable practices.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Learn more
                </a>  
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900 h-60">
        <div class="flex items-center justify-center h-full py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <p id="about_page" class="mb-8 text-lg font-normal text-gray-900 lg:text-5xl sm:px-16 lg:px-48 dark:text-gray-400">
            "Mycom is a platform for
            <strong class="font-bold text-gray-900 dark:text-white">documenting</strong> and
            <strong class="font-bold text-gray-900 dark:text-white">exploring</strong> fungi, allowing users to upload observations and contribute
            <strong class="font-bold text-gray-900 dark:text-white">valuable data</strong>. It serves as a collaborative space for
            <strong class="font-bold text-gray-900 dark:text-white">enthusiasts</strong> and
            <strong class="font-bold text-gray-900 dark:text-white">researchers</strong> to discover and share the rich
            <strong class="font-bold text-gray-900 dark:text-white">diversity of fungi</strong> in nature."
            </p>
        </div>
    </section>

    <?php include '../inc/footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html> 