$(document).ready(function () {
    // disappear flash successs message
    $("#successMessage").delay(3000).slideUp(300);

    // image upload and update interaction
    $("#imageUpload").on("change", function () {
        let input = this;

        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $("#previewImage").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    // confirmation alert on delete button
    $(".delete-btn").click(function (e) {
        e.preventDefault();

        let form = $(this).closest("form");

        Swal.fire({
            title: "Are you sure?",
            text: "This record will be deleted permanently!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#0d6efd", // Bootstrap blue
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    // confirmation before update
    $(".confirm-save").click(function (e) {
        e.preventDefault();

        let form = $(this).closest("form")[0];
        let actionType = $(this).data("action");

        // checking if there any form validation error
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        let titleText =
            actionType === "create"
                ? "Do you want to create this customer?"
                : "Do you want to update this customer?";

        Swal.fire({
            title: titleText,
            showCancelButton: true,
            confirmButtonText: "Save",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
