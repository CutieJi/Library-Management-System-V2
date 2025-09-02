<h2>Library Reports</h2>

<h3>Borrowed Books</h3>
<ul>
    <?php foreach($borrowed as $b): ?>
        <li><?= $b->book_title ?> - Borrowed by <?= $b->student_name ?> </li>
    <?php endforeach; ?>
</ul>

<h3>Returned Books</h3>
<ul>
    <?php foreach($returned as $r): ?>
        <li><?= $r->book_title ?> - Returned by <?= $r->student_name ?> </li>
    <?php endforeach; ?>
</ul>

<h3 style="color:red;">Overdue Books</h3>
<ul>
    <?php foreach($overdue as $o): ?>
        <li><?= $o->book_title ?> - Borrower: <?= $o->student_name ?> (Due: <?= $o->due_date ?>)</li>
    <?php endforeach; ?>
</ul>