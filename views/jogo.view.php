<?php


include __DIR__ . '/header.view.php';
?>

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-900">Meus Jogos</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($jogos)): ?>
            <?php foreach ($jogos as $jogo): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="/public/uploadsImg/<?= htmlspecialchars($jogo['imagem']) ?>" alt="<?= htmlspecialchars($jogo['titulo']) ?>" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2"><?= htmlspecialchars($jogo['titulo']) ?></h2>
                        <p class="text-gray-600 mb-1">Autor: <?= htmlspecialchars($jogo['autor']) ?></p>
                        <p class="text-gray-600 mb-1">Gênero: <?= htmlspecialchars($jogo['genero']) ?></p>
                        <p class="text-gray-600 mb-2">Ano: <?= htmlspecialchars($jogo['ano_lancamento']) ?></p>
                        <p class="text-gray-700 text-sm mb-4"><?= nl2br(htmlspecialchars($jogo['descricao'])) ?></p>

                        <div class="flex justify-between items-center mt-4">
                            <a href="/jogos/edit/<?= htmlspecialchars($jogo['id']) ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Editar
                            </a>
                            <form action="/jogos/delete/<?= htmlspecialchars($jogo['id']) ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este jogo?');">
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="col-span-full text-center text-gray-700">Nenhum jogo cadastrado ainda.</p>
        <?php endif; ?>
    </div>
</div>

</main>
</body>
</html>