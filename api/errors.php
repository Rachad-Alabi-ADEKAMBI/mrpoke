<div class="alert" width=400>
    <P>
        Merci de corriger les erreurs suivantes:
    </P>
    <ul>
        <?php foreach ($errors as $error): ?>
        <li style="color: red;"><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
</div>