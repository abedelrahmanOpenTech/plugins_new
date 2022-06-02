<?php
$categories = [
    [
        "id" => 1,
        "name" => "one"
    ],
    [
        "id" => 2,
        "name" => "two"
    ],
    [
        "id" => 3,
        "name" => "three"
    ]
];
$materials = [
    [
        "id" => 1,
        "category_id" => 1,
        "name" => "mat1"
    ],
    [
        "id" => 2,
        "category_id" => 1,
        "name" => "mat2"
    ],
    [
        "id" => 3,
        "category_id" => 2,
        "name" => "mat3"
    ],
    [
        "id" => 4,
        "category_id" => 3,
        "name" => "mat4"
    ],
    [
        "id" => 5,
        "category_id" => 3,
        "name" => "mat5"
    ],
    [
        "id" => 6,
        "category_id" => 3,
        "name" => "mat6"
    ]
];

?>
<script>
    window.materials = <?= json_encode($materials) ?>;
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpine tabs with php</title>

    <link rel="stylesheet" href="../style.css">

    <script defer src="alpine.js"></script>
</head>

<body x-cloak x-data="{selectedCategory:1}">


    <div class="tabs">
        <?php foreach ($categories as $category) : ?>
            <h3 class="h98uuiu" :class="selectedCategory=='<?= $category['id'] ?>'? 'selcted' :'' " @click="selectedCategory='<?= $category['id'] ?>'">
                <?= $category['name'] ?>
            </h3>
        <?php endforeach; ?>
    </div>

    <div>
        <?php foreach ($materials as $material) : ?>
            <h3 x-show="selectedCategory=='<?= $material['category_id'] ?>'" x-transition.opacity>
                <?= $material['name'] ?>
            </h3>
        <?php endforeach; ?>

    </div>
    <hr>
    <h1>
        pass php array to js
    </h1>
    <div x-data="{
        data:window.materials,
    }">
        <h2 x-text="data.length"></h2>
        <template x-for="material in data">
            <h2 x-text="material.name"></h2>
        </template>

    </div>

</body>

</html>