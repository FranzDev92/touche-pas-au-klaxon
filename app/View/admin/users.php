<h2 class="mb-4">Utilisateurs</h2>
<table class="table table-striped align-middle">
<thead>
<tr>
<th>Nom</th>
<th>Prénom</th>
<th>Email</th>
<th>Téléphone</th>
<th>Rôle</th>
</tr>
</thead>
<tbody>
<?php foreach($users as $u):?>
<tr>
<td><?=htmlspecialchars($u['nom'])?></td>
<td><?=htmlspecialchars($u['prenom'])?></td>
<td><?=htmlspecialchars($u['email'])?></td>
<td><?=htmlspecialchars($u['telephone']??'')?></td>
<td>
<?php if(($u['is_admin']??0)==1):?>
<span class="badge bg-danger">Admin</span>
<?php else:?>
<span class="badge bg-secondary">Utilisateur</span>
<?php endif;?>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
