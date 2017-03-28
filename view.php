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
                <td><?php echo $task->taskname; ?></td>
                <td><?php echo $task->location; ?></td>
                <td>
                  <?php
                  if ($task->completed == true) {
                    echo '<strike>Yes it is completed</strike>';
                    } else {
                      echo 'Not yet completed';
                    }
                  ?>

                </td>
            </tr>

          <?php endforeach ?>
      </tbody>


    </table>




</body>
</html>
