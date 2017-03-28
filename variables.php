<!doctype html>
<html>
<head>
</head>
<body>
    <table border='1'>
      <thead>
          <tr>
              <th>Task Name</th>
              <th>Location</th>
              <th>Is Completed</th>
          </tr>
      </thead>
      
      <tbody>
          <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?php echo $task['task']; ?></td>
                <td><?php echo $task['Location']; ?></td>
                <td>
                  <?php
                  if ($task['completed'] == true) {
                    echo converttoupper('Yes it is completed');
                    } else {
                      echo converttoupper('Not yet completed');
                    }
                  ?>

                </td>
            </tr>

          <?php endforeach ?>
      </tbody>


    </table>




</body>
</html>
