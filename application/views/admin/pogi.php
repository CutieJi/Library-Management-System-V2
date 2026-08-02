<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Accounts Confirmation</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Fist Name</th>
                            <th>Last Name</th>
                            <th>Student No.</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Phone No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pending_users)) : ?>
                            <tr>
                                <td colspan="8" class="text-center">No pending accounts</td>
                            </tr>
                        <?php else : ?>
                            <?php $i = 1; foreach($pending_users as $user) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $user['first_name']; ?></td>
                                    <td><?= $user['last_name']; ?></td>
                                    <td><?= $user['username']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['gender']; ?></td>
                                    <td><?= $user['phone_number']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/approve/'.$user['id']); ?>" class="approve-btn" data-url="<?= base_url('admin/approve/'.$user['id']); ?>"><span class="badge bg-success">Approve</span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<script>
document.addEventListener("click", function (e) {
  const btn = e.target.closest(".approve-btn");
  if (!btn) return;

  e.preventDefault();
  const dataUrl = btn.dataset.url || btn.href;

  if (typeof Swal === "undefined") {
    if (confirm("Are you sure you want to approve this account?")) {
      window.location.assign(dataUrl);
    }
    return;
  }

  Swal.fire({
    icon: "warning",
    html: "Are you sure you want to approve this account?",
    showCancelButton: true,
    confirmButtonColor: "#d9534f",
    cancelButtonColor: "#5cb85c",
    confirmButtonText: "Yes, Approve",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.assign(dataUrl);
    }
  });
});
</script>