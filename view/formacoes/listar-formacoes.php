<?php include __DIR__ . '/../inicio-html.php'; ?>

<a href="/nova-formacao" class="btn btn-primary mb-2">Nova Formação</a>

<ul class="list-group">
    <?php foreach ($formacoes as $formacao) : ?>
        <li class="list-group-item d-flex justify-content-between">
            <?= $formacao->getDescricao(); ?>
            <span>
                <a href="" class="btn btn-danger btn-sm">
                    Excluir
                </a>
            </span>
        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . '/../fim-html.php'; ?>