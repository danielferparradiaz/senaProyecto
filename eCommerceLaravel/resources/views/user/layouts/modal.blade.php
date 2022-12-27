<div class="modal fade col-12"  id="buscar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content modalSearch shadow-lg">
            <div class="modal-body d-flex align-items-center col-12 justify-content-end">
                <div class="col-6 me-2">
                    <h1 class="modal-title fs-4  text-light " id="exampleModalLabel">Buscar</h1>
                </div>
                <div class="col-1">
                    <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group flex-nowrap shadow-lg">
                    <input type="text" class="form-control" id="text-search" placeholder="Buscar.." aria-label="Username" aria-describedby="addon-wrapping" autofocus>
                    <span class="input-group-text iconSearch" id="addon-wrapping" role="button"><img class="" src="{{ url('assets/images/icon/search.svg')}}" alt=""></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        $('#addon-wrapping').click(function(){
            let text = $('#text-search').val()
            location.href = "/productos/search/"+text;

        });
        $('#text-search').keypress(function(event){
            if (event.key === "Enter")
            $('#addon-wrapping').click();
        });

</script>
