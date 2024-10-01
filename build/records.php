<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Mycom</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            padding-top: 100px;
        }
    </style>
</head>
<body class="bg-blue-200">
    <?php include '../inc/header.php'; 

    // Fetch records from the database
    $sql = 'SELECT * FROM records';
    $result = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>

    <!-- Grid Container -->
    <section class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($feedback as $item): ?>
                <!-- Card -->
                <a href="#" class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform hover:scale-105 duration-300 ease-in-out">
                    <!-- Ensure the image and content are aligned horizontally -->
                    <div class="flex items-center">
                        <!-- Image -->
                        <img class="object-cover w-48 h-48 rounded-l-lg" 
                            src="<?php echo $item['url']; ?>" 
                            alt="<?php echo $item['species_name']; ?>">
                        <div class="p-4 leading-normal">
                            <!-- Name -->
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <span class="italic"><?php echo $item['species_name']; ?></span>
                            </h5>
                            <!-- Description -->
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <?php echo $item['description']; ?>
                            </p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include '../inc/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>
