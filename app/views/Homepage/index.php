<?php $this->component('PageEsentials/head', ['title' => "HomePage"]); ?>

<body>
    <h1><?= $data['title']; ?></h1>

    <form action="/Homepage/getModels" method="post">
        <input type="text" placeholder="Brand name" name="brandName">

        <button>Submit</button>
    </form>

    <?php if ($data['model']) : ?>
        <?php var_dump($data["model"]) ?>
        <h3>Best <?= $data['model']['make'] ?> model:</h3>
        <p>Model: <?= $data['model']['model'] ?></p>
        <p>Displacement: <?= $data['model']['displacement'] ?></p>
        <p>Year: <?= $data['model']['year'] ?></p>
        <p>Transmission: <?= $data['model']['transmission'] ?></p>
        <p>Fuel: <?= $data['model']['fuel_type'] ?></p>
    <?php endif; ?>

</body>

</html>