<?php $this->component('PageEsentials/head', ['title' => "HomePage"]); ?>

<body>
    <h1><?= $data['title']; ?></h1>

    <form action="/Homepage/getModels" method="post">
        <input type="text" placeholder="Brand name" name="brandName">

        <button>Submit</button>
    </form>

    <?php if ($data['models']) : ?>
        <ul>
            <?php foreach ($data['models'] as $model) : ?>
                <li><?= $model['model']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</body>

</html>