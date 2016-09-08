<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
<!-- 

LOG OFF
LINK TO SPECIFIC USERS
EDIT  - pass id of specific user
REMOVE
-->

<div class="container main_container">
    <h3>Manage Users<a href="/users/new" class="float-right btn btn-primary" role="button">Add new</a></h3>
    <?php echo $this->session->flashdata('success'); ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>created_at</th>
                <th>user_level</th>
                <th>Actions</th>
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
                <td>
                    <a href="/users/edit/<?php echo $user['id']?> ">edit</a>
                   <!-- <a onclick="delete(<?php echo $user['id'];?>);">remove</a>   -->

                    <a href="/users/remove/<?php echo $user['id'];?>" onclick="return confirmDelete(<?php echo $user['id'];?>);">remove</a>               
                </td>                
            </tr>
        <?php } ?>
      </tbody>
    </table>
</div>

<!-- or -->

<script type="text/javascript">
    function confirmDelete(id) {
        return confirm('Are you sure you want to remove this user?');
    }
</script>
</body>
</html>

