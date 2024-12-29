// オブジェクト.メソッド
// 初期化？
document.addEventListener("DOMContentLoaded", () => {
	// 変数にエレメントを代入
    const toggleButton = document.getElementById('toggleMessageButton');
	// 変数にエレメントを代入
    const message = document.getElementById('message');
	// 変数がクリックされたときに処理を追加
    toggleButton.addEventListener("click", () => {
		// もしhiddenを含むならhiddenを取り除くそうでなければhiddenを追加する
        if (message.classList.contains('hidden')) {
            message.classList.remove('hidden');
        } else {
            message.classList.add('hidden');
        }
    });
});
