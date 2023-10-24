window.addEventListener("load", function () {
	const statusOnlineOffline = () => {
		const condition = navigator.onLine;
		if (!condition) {
			$("#snackbar-error").removeClass("hidden");
            $("#snackbar-success").addClass("hidden");
            $('.snackbar-message').html('Koneksi internet terputus');
			return;
		} else {
			$("#snackbar-error").addClass("hidden");
            $("#snackbar-success").removeClass("hidden");
            $('.snackbar-message').html('Koneksi internet tersambung');
			setTimeout(function () {
				$("#snackbar-error").addClass("hidden");
				$("#snackbar-success").addClass("hidden");
			}, 6200);
		}
	};

	window.addEventListener("online", statusOnlineOffline);
	window.addEventListener("offline", statusOnlineOffline);
});
