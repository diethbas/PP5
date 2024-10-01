<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Mycom</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-blue-200">
    <?php include '../inc/header.php' ?>

    <?php
    // Set variables to empty values
    $name = $email = $species_name = $description = $url = '';
    $nameErr = $emailErr = $species_nameErr = $descriptionErr = $urlErr = '';

    // Form submit
    if (isset($_POST['submit'])) {
        // Validate name
        if (empty($_POST['name'])) {
            $nameErr = 'Name is required';
        } else {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate species name
        if (empty($_POST['species_name'])) {
            $species_nameErr = 'Species name is required';
        } else {
            $species_name = filter_input(INPUT_POST, 'species_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate email
        if (empty($_POST['email'])) {
            $emailErr = 'Email is required';
        } else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid email format';
            }
        }

        // Validate description
        if (empty($_POST['description'])) {
            $descriptionErr = 'Description is required';
        } else {
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate URL
        if (empty($_POST['url'])) {
            $urlErr = 'URL is required';
        } else {
            $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
            if ($url === false) {
                $urlErr = 'Invalid URL format';
            }
        }

        // If no errors, insert into database
        if (empty($nameErr) && empty($species_nameErr) && empty($emailErr) && empty($descriptionErr) && empty($urlErr)) {
            // Add to database
            $sql = "INSERT INTO records (name, species_name, description, email, url) VALUES ('$name', '$species_name', '$description', '$email', '$url')";
            
            if (mysqli_query($conn, $sql)) {
                // Success
                header('Location: records.php');
                exit(); 
            } else {
                // Error
                echo 'Error: ' . mysqli_error($conn);
            }
        }        
    }
    ?>

    <div class="relative flex justify-center items-center min-h-screen py-8">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="lined-paper max-w-lg w-full mx-auto p-6 bg-white shadow-lg rounded-lg relative z-10">
            <!-- Full Name -->
            <div class="relative z-0 w-full mb-4 group">
                <input type="text" name="name" id="name" class="block py-2 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo htmlspecialchars($name); ?>" />
                <?php if (!empty($nameErr)) { ?> <span class="text-red-500 text-sm"> <?php echo $nameErr; ?></span> <?php } ?>
                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full Name</label>
            </div>

            <!-- Email -->
            <div class="relative z-0 w-full mb-4 group">
                <input type="email" name="email" id="email" class="block py-2 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo htmlspecialchars($email); ?>" />
                <?php if (!empty($emailErr)) { ?> <span class="text-red-500 text-sm"> <?php echo $emailErr; ?></span> <?php } ?>
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email Address</label>
            </div>

            <!-- Species Name -->
            <div class="relative z-0 w-full mb-4 group">
                <input type="text" name="species_name" id="species_name" class="block py-2 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo htmlspecialchars($species_name); ?>" />
                <?php if (!empty($species_nameErr)) { ?> <span class="text-red-500 text-sm"> <?php echo $species_nameErr; ?></span> <?php } ?>
                <label for="species_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Species Name</label>
            </div>

            <!-- Description -->
            <div class="relative z-0 w-full mb-4 group">
                <textarea name="description" id="description" rows="4" class="block py-2 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required><?php echo htmlspecialchars($description); ?></textarea>
                <?php if (!empty($descriptionErr)) { ?> <span class="text-red-500 text-sm"> <?php echo $descriptionErr; ?></span> <?php } ?>
                <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
            </div>

            <!-- URL Input -->
            <div class="relative z-0 w-full mb-4 group">
                <input type="url" name="url" id="url" class="block py-2 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo htmlspecialchars($url); ?>" />
                <?php if (!empty($urlErr)) { ?> <span class="text-red-500 text-sm"> <?php echo $urlErr; ?></span> <?php } ?>
                <label for="url" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">File URL</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="submit" value="Send" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-4 py-2 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>

    <?php include '../inc/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>
