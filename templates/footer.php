</td>

<td width="300px" class="sidebar">
    <div class="sidebarHeader">Меню</div>
    <ul>
        <?php if(!empty($user) && $user->isAdmin()) : ?>
            <li><a href="/articles/add">Добавить статью</a></li>
            <li><a href="/admin/articles">Админка</a></li>
        <?php endif; ?>
        <li><a href="/">Главная страница</a></li>
        <li><a href="/about-me">Обо мне</a></li>
    </ul>
</td>
</tr>
<tr>
    <td class="footer" colspan="2">Все права защищены (c) Мой блог</td>
</tr>
</table>

</body>
</html>