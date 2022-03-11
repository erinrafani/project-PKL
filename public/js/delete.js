$(".delete-confirm").click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: "Kamu yakin?",
        text: "Menghapus Data Table!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});
