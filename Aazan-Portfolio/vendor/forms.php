<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Process.php" method="POST">
        <input type="text" name="firstName">
        <br>
        <input type="file" name="image" id="image">
        <input type="hidden" name="lastName" id="Name" value="Aazan">
        <input type="button" value="cast" onclick="submitInnerForm()">

        <input type="submit">
    </form>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function submitInnerForm() {

        var formData = new FormData();
        var file = $('#image')[0].files[0];
        var Name = $('#Name').val();
        formData.append('image', file);
        formData.append('Name', Name);
        // image = $("#image").val();

        $.ajax({
            url: "Process.php",
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                console.log(result);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }          
</script>