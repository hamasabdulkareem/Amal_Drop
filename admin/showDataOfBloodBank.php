<?php
include 'header.php';
$table = 'bloodbank';
$query = "SELECT * FROM $table";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
$i = 1;
?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['DataofBloodBank']?></h2>
					</header>
				</div>
			</section>
<section>
    <div class="has-form">
<br><br><br>
    <table style="border-collapse:collapse">
        <thead>
            <tr>
                <th></th>
                <th><?php echo $lang['BloodBank_Name']?> </th>
                <th><?php echo $lang['Email']?></th>
                <th><?php echo $lang['Address']?></th>
                <th><?php echo $lang['Phone']?></th>
                <th><?php echo $lang['Password']?></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>            <?php
            if ($count != 0) {
                while ($row = mysqli_fetch_assoc($result)):
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['BloodBank_Name']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Phone']; ?></td>
                        <td><?php echo $row['Password']; ?></td>
                        <td>
                            <a href="edit_bloodbank.php?id=<?php echo $row['BloodBank_ID']; ?> && lang=en"><?php echo $lang['Modify']; ?></a> </td>
                        <td>
                            <a id="delete" onclick="javascript: return confirm(Please confirm deletion:Are you sure you want to delete this row?'');" href="delete_bloodbank.php?id=<?php echo $row['BloodBank_ID']; ?>"><?php echo $lang['Delete']; ?></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endwhile;
            } else {
                ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: #f00"><?php echo $lang['Datanotfound']; ?></td>
                </tr>
                <?php
                  }
            ?>
        </tbody>
    </table>
        </div>
</section>
<?php
echo "<br><br><br><br><br><br><br><br><br><br>";
include '../footer.php'; ?>