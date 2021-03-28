<?php
include 'header.php';
$v = $_SESSION['BloodBank_ID'];
$query = "SELECT * FROM test,donor WHERE test.Donor_ID = donor.Donor_ID ";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
$i = 1;
?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['data']?></h2>
					</header>
				</div>
			</section>
<section style="text-align: center; margin-right: 200px;">
    <div class="has-form">
<br><br><br>
    <table style="border-collapse:collapse; margin-right: 100px;">
        <thead>
            <tr>
                <th></th>
                <th><?php echo $lang['Donor_Name']?> </th>
                <th><?php echo $lang['Hcv_ab']?></th>
                <th><?php echo $lang['HB_SAg']?></th>
                <th><?php echo $lang['Hiv_ab']?></th>
                <th><?php echo $lang['Hp']?></th>
                <th><?php echo $lang['pcv']?></th>
                <th><?php echo $lang['MalariaParasiteSmear']?></th>
                <th><?php echo $lang['BI_group']?></th>
                <th><?php echo $lang['HBC_ab']?></th>
                <th><?php echo $lang['statue']?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>            <?php
            if ($count != 0) {
                while ($row = mysqli_fetch_assoc($result)):
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['Donor_Name']; ?></td>
                        <td><?php echo $row['Hcv_ab']; ?></td>
                        <td><?php echo $row['HB_SAg']; ?></td>
                        <td><?php echo $row['Hiv_ab']; ?></td>
                        <td><?php echo $row['Hp']; ?></td>
                        <td><?php echo $row['pcv']; ?></td>
                        <td><?php echo $row['MalariaParasiteSmear']; ?></td>
                        <td><?php echo $row['BI_group']; ?></td>
                        <td><?php echo $row['HBC_ab']; ?></td>
                        <td><?php echo $row['statue']; ?></td>
                        <td>
                            <a href="edite_test.php?id=<?php echo $row['Donor_ID']; ?> && lang=en"><?php echo $lang['Modify']; ?></a> </td>

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