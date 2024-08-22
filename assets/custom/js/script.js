$(document).ready(function () {
	$(".select-2").select2({
		minimumResultsForSearch: Infinity,
		theme: "classic",
		closeOnSelect: true,
		dropdownCssClass: "select2Font",
	});

	let ms_id = 0;

	let controller_page = $("#controller_page").val();

	// miss routes
	let get_miss = $("#get_miss").val();
	let get_miss_rating = $("#get_miss_rating").val();
	let save_miss_rating = $("#save_miss_rating").val();

	let judgeID = $("#judgeID").val();

	//miss start
	//
	//on click ms link
	$(".ms-link").on("click", function () {
		$(".ms_tab").children().removeClass("active");
		$(this).addClass("active");

		var canNo = $(this).attr("title");
		ms_id = canNo;

		// getting the details of the miss candidate
		$.ajax({
			type: "GET",
			url: get_miss + canNo,
			dataType: "json",
			success: function (response) {
				if (response.record) {
					let html = ``;
					$(".wrapper").html(html);

					$("#ms_content").css("display", "inline");

					var name = response.record.fullname;
					var fontSize;
					var basePadding = 1; // Adjust this base padding value as needed

					var fontSize;

					if (name.length > 30) {
						fontSize = "20.5px";
						basePadding = "20px";
					} else if (name.length > 20) {
						fontSize = "28.5px";
						basePadding = "20px";
					} else if (name.length > 15) {
						fontSize = "30.5px";
						basePadding = "20px";
					} else if (name.length > 10) {
						fontSize = "40.5px";
						basePadding = "10px";
					} else {
						fontSize = "48.5px";
						basePadding = "10px";
					}

					// Apply dynamic padding based on the font size
					$(".candidate-name").css("padding-bottom", basePadding);
					$(".candidate-name").css("padding-top", basePadding);

					$(".candidate-name").css("font-size", fontSize);

					console.log(name.length);

					$("#ms_badge").text(response.record.canNo);
					$("#ms_name").text("Ms. " + response.record.fullname);
					$("#ms_remarks").text(response.record.remarks);

					var img_link =
						controller_page +
						"assets/custom/uploads/candidates/ms/" +
						response.record.canNo +
						".jpg";
					$("#ms_img").attr("src", img_link);
				} else {
					Swal.fire({
						icon: "error",
						title: "Internal Server Error",
						text: "Please contact administrator",
					});
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				Swal.fire({
					icon: "error",
					title: "Internal Server Error",
					text: "Please contact administrator",
				});
			},
		});

		// Ajax request to get production rating for miss
		$.ajax({
			type: "GET",
			url: get_miss_rating + judgeID + "/" + canNo,
			dataType: "json",
			success: function (response) {
				if (response.record) {
					updateDropdown("#ms_score", response.record.score, 100, 50);
				} else {
					updateDropdown("#ms_score");
				}
			},
			error: function (error) {
				Swal.fire({
					icon: "error",
					title: "Internal Server Error",
					text: "Please contact administrator",
				});
			},
		});
	});

	// on click score miss
	$("#ms_score").on("change", function () {
		var ms_crit2 = $(this).val();
		var score = parseInt(ms_crit2);

		var data = {
			canNo: ms_id,
			judgeID: judgeID,
			score: score,
		};

		$.ajax({
			type: "POST",
			url: save_miss_rating,
			data: data,
			dataType: "json",
			beforeSend: function () {
				// $(".loading-miss").addClass("spinner-grow text-secondary");
				let html = `
				<div class="spinner-border" role="status">
					<span class="sr-only">Loading...</span>
				</div>
				`;
				$(".wrapper").html(html);
			},
			success: function (response) {
				// $(".loading-miss").removeClass("spinner-grow text-secondary");
				let html = `
				<svg class="checkmark" viewBox="0 0 52 52">
					<circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
					<path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
				</svg>
				`;
				$(".wrapper").html(html);
			},
			error: function (xhr, textStatus, errorThrown) {
				Swal.fire({
					icon: "error",
					title: "Internal Server Error",
					text: "Please contact administrator",
				});
			},
		});
	});
	// miss score end

	let ms_first_id = $(".pills-tab li:first button").attr("title");

	$("#ms_" + ms_first_id).click();
});

//generic functions
// Function to generate option HTML based on the given values
function generateOptions(responseValue, includeZero, start, end) {
	let optionsHtml = `<option value=""></option>`;
	for (let i = start; i >= end; i--) {
		if (responseValue != 0) {
			const selected = responseValue == i ? "selected" : "";
			optionsHtml += `<option value="${i}" ${selected}>${i}</option>`;
		} else {
			optionsHtml += `<option value="${i}">${i}</option>`;
		}
	}

	optionsHtml += `<option value="0">0</option>`;

	return optionsHtml;
}

// Function to update the dropdown with options based on response
function updateDropdown(dropdownID, responseValue, start, end) {
	const includeZero = !responseValue;
	const optionsHtml = generateOptions(responseValue, includeZero, start, end);
	$(dropdownID).html(optionsHtml);
}
