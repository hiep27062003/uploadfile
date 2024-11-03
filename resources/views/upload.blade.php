<div class="container mx-auto my-10">
    <form id="uploadForm" method="POST" action="{{ route('uploads.store') }}" enctype="multipart/form-data" class="border-2 border-dashed border-gray-300 p-10 text-center" 
          ondrop="handleDrop(event)" ondragover="event.preventDefault()" onpaste="handlePaste(event)">
        @csrf
        <input type="file" id="fileInput" name="file" class="hidden" onchange="this.form.submit()">
        <div id="uploadArea" class="text-gray-500">
            Kéo và thả file vào đây hoặc nhấn Ctrl+C/Ctrl+V để upload
        </div>
    </form>
</div>

<script>
    function handleDrop(event) {
        event.preventDefault();
        let files = event.dataTransfer.files;
        if (files.length) {
            document.getElementById('fileInput').files = files;
            document.getElementById('uploadForm').submit();
        }
    }

    function handlePaste(event) {
        let items = event.clipboardData.items;
        for (let item of items) {
            if (item.kind === 'file') {
                document.getElementById('fileInput').files = item.getAsFile();
                document.getElementById('uploadForm').submit();
            }
        }
    }
</script>
