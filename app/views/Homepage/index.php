<?php $this->component('PageEsentials/head', ['title' => "HomePage"]); ?>

<body>
    <div class="container">
        <h1><?= $data['title']; ?></h1>

        <form action="/Homepage/getModels" method="post">
            <input type="text" placeholder="Brand name" name="brandName">

            <input type="submit" value="Submit">
        </form>

        <?php if ($data['bestModel']) : ?>
            <div class="carData">
                <h3>Best <?= $data['bestModel']['make'] ?> model:</h3>
                <a href="https://www.google.com/search?q=<?= $data['bestModel']['make'] . "%20" . $data['bestModel']['model'] ?>" target="_blank">
                    <p>Model: <?= $data['bestModel']['model'] ?></p>
                </a>
                <p>Displacement: <?= $data['bestModel']['displacement'] ?></p>
                <p>Year: <?= $data['bestModel']['year'] ?></p>
                <p>Transmission: <?= $data['bestModel']['transmission'] ?></p>
                <p>Fuel: <?= $data['bestModel']['fuel_type'] ?></p>
            </div>
        <?php endif; ?>

        <?php if ($data['worstModel']) : ?>
            <div class="carData">
                <h3>Worst <?= $data['worstModel']['make'] ?> model:</h3>
                <a href="https://www.google.com/search?q=<?= $data['worstModel']['make'] . "%20" . $data['worstModel']['model'] ?>" target="_blank">
                    <p>Model: <?= $data['worstModel']['model'] ?></p>
                </a>
                <p>Displacement: <?= $data['worstModel']['displacement'] ?></p>
                <p>Year: <?= $data['worstModel']['year'] ?></p>
                <p>Transmission: <?= $data['worstModel']['transmission'] ?></p>
                <p>Fuel: <?= $data['worstModel']['fuel_type'] ?></p>
            </div>
        <?php endif; ?>
        <p id="dad-joke"><?= $data['joke'] ?></p>
    </div>
</body>

</html>