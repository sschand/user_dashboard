<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>


<div class="container main_container">
    <h3>All Users</h3>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>created_at</th>
                <th>user_level</th>
            </tr>
        </thead>
    <tbody>
        <?php foreach ($users as $user){ ?>
            <tr>
                <td><?php echo $user['id'] ?> </td>
                <td><a href="/users/show/<?php echo $user['id'] ?>"><?php echo $user['first_name'] . ' ' . $user['last_name']?></a> </td>
                <td><?php echo $user['email']?> </td>
                <td><?php echo $user['created_at']?> </td>
                <td><?php echo ($user['level'] == 9) ? 'admin' : 'normal'?> </td>                       
            </tr>
        <?php } ?>
      </tbody>
    </table>
</div>

</body>
</html>

