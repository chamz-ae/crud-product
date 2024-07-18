<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $row["id"]  ?></td>
        <td><?= $row["nama"]  ?></td>
        <td><?= $row["product"]  ?></td>
        <td><?= $row["jenis"]  ?></td>
        <div class="fitur">
        <td class="fitur"><b>
            <a style="text-decoration: none; color: red;" href="delete.php?$id=<?= $row["id"]; ?> "onclick="return confirm('yakin?');">Hapus</a>
            <a style="text-decoration: none; color: green;" href="update.php?id=<?= $row["id"]; ?>">||  Update</a>
            </b>
        </td>
        </div>
    </tr>
<?php endwhile; ?>

<!-- BEDAA -->

<tr>
                <td><?= $product['id']; ?></td>
                <td><?= $product['nama']; ?></td>
                <td><?= $product['product']; ?></td>
                <td><?= $product['jenis']; ?></td>
                <td class="fitur">
                    <b>
                        <a style="text-decoration: none; color: red;" href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin?');">Hapus</a>
                        <a style="text-decoration: none; color: green;" href="update.php?id=<?= $row['id']; ?>">||
                            Update</a>
                    </b>
                </td>
            </tr>