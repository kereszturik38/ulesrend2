<table>
	<tr>
		<th colspan="3">
			<h2>Ülésrend</h2>
		</th>
		<th colspan="3">
			<?php

			if (!empty($_SESSION["id"])) {
				if (in_array($_SESSION["id"], $adminok)) {
			?>
					<form action="index.php?page=ulesrend" method="post">
						Hiányzó: <select name="hianyzo_id">
							<?php


							if ($ID_lista) {
								foreach ($ID_lista as $id) {
									$tanulo->set_user($id, $conn);
									if ($tanulo->get_nev() and !in_array($id, $hianyzok)) echo '<option value="' . $id . '">' . $tanulo->get_nev() . '</option>';
								}
							}
							?>

						</select>
						<br>
						<input type="submit">
					</form>

			<?php
				}
			}
			?>
		</th>
	</tr>

	<?php



	if ($ID_lista) {
		// output data of each row
		$sor = 0;
		foreach ($ID_lista as $id) {
			$tanulo->set_user($id, $conn);
			if ($tanulo->get_sor() != $sor) {
				if ($sor != 0) echo '</tr>';
				echo '<tr>';
				$sor = $tanulo->get_sor();
			}
			if (!$tanulo->get_nev()) echo '<td class="empty"></td>';
			else {
				$plusz = '';
				if (in_array($id, $hianyzok)) $plusz .=  ' class="missing"';
				if ($id == $en) $plusz .=  ' id="me"';
				if ($id == $tanar) $plusz .=  ' colspan="2"';
				$pfpres = glob("profilkepek/" . $id . ".{png,jpg,jpeg}", GLOB_BRACE);
				if (!empty($pfpres) && $pfpres != false) {
					$pfpstr = end($pfpres);
					$plusz .= ' style="background-image: url(' . $pfpstr . ') ;background-size:contain;background-repeat:no-repeat"';
				}
				echo "<td" . $plusz . ">" . $tanulo->get_nev();
				if (!empty($_SESSION["id"])) {
					if (in_array($_SESSION["id"], $adminok)) {
						if (in_array($id, $hianyzok)) echo '<br><a href="index.php?page=ulesrend&nem_hianyzo=' . $id . '">Nem hiányzó</a>';
					}
				}
				echo "</td>";
			}
		}
	} else {
		echo "0 results";
	}
	$conn->close();

	?>
</table>


</body>

</html>