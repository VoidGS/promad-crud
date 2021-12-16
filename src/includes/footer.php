<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar usuário</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Tem certeza que deseja excluir o usuário <strong id="deleteId">#ID</strong> - <strong id="deleteName">Nome</strong></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">
                    Fechar
                </button>
                <a type="button" id="deleteBtn" class="btn btn-primary">Excluir</a>
            </div>
        </div>
    </div>
</div>

</body>

<!-- MDB -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../includes/js/index.js"></script>

</html>

<?php
    if (isset($_SESSION["alert"])) {
        echo "
        <script>
            Swal.fire({
                icon: '" . $_SESSION["alert"]["status"] . "',
                title: '" . $_SESSION["alert"]["message"] . "',
            })
        </script>
        ";
        unset($_SESSION["alert"]);
    }
?>