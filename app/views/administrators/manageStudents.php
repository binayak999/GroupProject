
<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeManage addNewBox">
    <a href = "/GroupProject/public/ManageStudents/add">
      <div style="width: 100%; height: 80%; padding-top: 4%;">
        <img src = "/GroupProject/public/resources/images/addstudent.png" width="50"><br>
        Student Admission
      </div>
    </a>
  </div>


  <?php
    echo $note;
  ?>


</div>

<!-- Search box To be edited later -->

<!--
<div class = "boxesContainer boxesContainerManage">
  <div class = "adminManageTable" style="text-align: center; width:calc(50% - 15px); padding:5px;">
    <select style="width: 98%; height: 35px;">
      <option>L4</option>
    </select>
  </div>
  <div class = "adminManageTable" style="text-align: right; width: calc(50% - 15px); padding:5px;">
        <input type = "search" placeholder="Search" style="width: 240px; height: 35px; padding-left: 10px;">
        <input type = "submit" value = "Go" name = "submitSearch" style="width: 40px; height: 35px;">
  </div>

</div> -->




<div class = "adminManageTable">

  <div class = "tableTitle">
    <h1 class = "tableHeading">Manage Students</h1>
  </div>

  <table>
    <tr>
      <th>S.N.</th>
      <th>Login ID</th>
      <th>Full Name</th>
      <th>Gender</th>
      <th>Birthdate</th>
      <th>Level</th>
      <th>Course</th>
      <th>Email</th>
      <th>Manage</th>
      <th>Status</th>
    </tr>
    <?php



    $count = 0;
      while($user = $users->fetch()){


        $student=getStudentById($user['uid'])->fetch();
        $enCourse = getCourseById($student['cid'])->fetch();
        $enLevel = getLevelById($student['slvid'])->fetch();

        $viewIcon = '<a href = "/GroupProject/public/ManageStudents/browse/'.$user['uid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/view.svg">
                        </a>';

        $archiveIcon = '<a href = "/GroupProject/public/ManageStudents/archive/'.$user['uid'].'">
                          <img class = "tableIcon" src = "/GroupProject/public/resources/images/archive.svg">
                        </a>';

        $statusText = $student['rstatus']=="Live" ? '<font color = "green">Live</font>':
                                                           '<font color = "red">Dormant</font>';


        $count++;
        echo '<tr>
                <td>'.$count.'</td>
                <td>'.$user['uid'].'</td>
                <td>'.$user['fname'].' '.$user['mname'].' '.$user['lname'].'</td>
                <td>'.$user['gender'].'</td>
                <td>'.$user['birthdate'].'</td>
                <td>'.$enLevel['lvtitle'].'</td>
                <td>'.$enCourse['ctitle'].'</td>
                <td><a href = "mailto:'.$user['uemail'].'">'.$user['uemail'].'</a></td>
                <td>'.$viewIcon.' &nbsp;'.$archiveIcon.'</td>
                <td>'.$statusText.'</td>';

      }
    ?>
  </table>

</div>
