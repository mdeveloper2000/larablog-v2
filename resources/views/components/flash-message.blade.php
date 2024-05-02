@if(session()->has('message'))
    <div class="toast align-items-center text-bg-primary border-3 border-info position-fixed top-0 end-0 mt-3 me-3 p-3" 
        id="liveToast" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 100;">
        <div class="d-flex">
            <div class="toast-body">
                {{session('message')}}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <script>        
        window.onload = () => {
            const toastLiveExample = document.querySelector("#liveToast")
            const toast = new window.bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    </script>

@endif