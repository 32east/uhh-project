<div class="container">
    <div class="flex-container">
        <input type="text" id="urlInput" placeholder="Введите URL" />
        <button id="shortenBtn">Сократить</button>
    </div>

    <div id="result" class="result"></div>
</div>

<script>
    function copyToClipboard(text) {
        const tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
    }

    document.getElementById('shortenBtn').addEventListener('click', function() {
        const urlInput = document.getElementById('urlInput').value;
        const resultDiv = document.getElementById('result');

        resultDiv.style.transition = 'opacity 0s';
        resultDiv.style.opacity = 0;

        if (urlInput) {
            fetch('/api/v1/shorty?url=' + urlInput, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
            })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Ошибка при генерации.');
                    }
                })
                .then(data => {
                    if (data.success) {
                        const shortenedUrl = `${window.location.origin}/${data.url}`;
                        resultDiv.style["margin-top"] = "10px";
                        resultDiv.style.transition = 'opacity 0.5s';
                        resultDiv.innerHTML = `Сокращённая ссылка: <a href="${shortenedUrl}" id="shortenedLink">${shortenedUrl}</a><br>Ссылка была скопирована в буфер обмена.`;
                        resultDiv.style.opacity = 1;
                        copyToClipboard(shortenedUrl);

                    } else {
                        throw new Error('Ошибка при генерации.');
                    }
                })
                .catch(error => {
                    console.log(error);
                    resultDiv.style["margin-top"] = "10px";
                    resultDiv.style.transition = 'opacity 0.5s';
                    resultDiv.textContent = 'Ошибка при генерации.';
                    resultDiv.style.opacity = 1;
                });
        } else {
            resultDiv.style["margin-top"] = "10px";
            resultDiv.style.transition = 'opacity 0.5s';
            resultDiv.textContent = 'Пожалуйста, введите URL.';
            resultDiv.style.opacity = 1;
        }
    });
</script>
