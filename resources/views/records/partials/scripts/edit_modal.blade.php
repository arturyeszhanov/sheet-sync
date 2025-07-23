<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editModalEl = document.getElementById('editModal');
        const editForm = document.getElementById('edit-form');

        editModalEl.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;

            const id = button.getAttribute('data-id');
            const text = button.getAttribute('data-text');
            const status = button.getAttribute('data-status');

            document.getElementById('edit-text').value = text;
            document.getElementById('edit-status').value = status;
            document.getElementById('edit-id').value = id;

            editForm.action = `/records/${id}`;
        });
    });
</script>