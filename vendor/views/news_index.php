<h2>All News</h2>
<table>
    <tr>
        <th>№</th>
        <th>Title</th>
        <th>Article</th>
        <th>Date create</th>
        <th>Date update</th>
        <th>Author</th>
    </tr>
    <?php if(count($newsAll)>0):?>
    <?php foreach ($newsAll as $news):?>
    <tr>
        <td><?=$news['id']?></td>
        <td><?=$news['title']?></td>
        <td><?=$news['text']?></td>
        <td><?=$news['createdate']?></td>
        <td><?=$news['updatedate']?></td>
        <td><?=$news['author']?></td>
        <td><form action="/news/edit" method="get">
                <input type="hidden" name="id" value="<?= $news['id']?>">
                <input type="submit" value="edit" >
            </form>
        </td>
        <?php endforeach;?>
        <?php endif;?>
    </tr>
</table>
<form action="/news/create">
    <input type="submit" value="new note">
</form>
