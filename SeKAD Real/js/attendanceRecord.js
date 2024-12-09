document.addEventListener("DOMContentLoaded", () => {
    const attendanceList = document.getElementById("attendance-list");

    // Fetch student data from PHP
    fetch("getStudent.php")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Failed to fetch students");
            }
            return response.json();
        })
        .then((students) => {
            // Render each student with a checkbox
            students.forEach((student) => {
                const studentItem = document.createElement("div");
                studentItem.className = "attendance-item";

                studentItem.innerHTML = `
                    <label>${student.name} (IC: ${student.ic_number})</label>
                    <input type="checkbox" id="student-${student.id}" />
                `;

                attendanceList.appendChild(studentItem);
            });

            // Add event listener to submit attendance once data is loaded
            document.getElementById("submit-attendance").addEventListener("click", () => {
                const attendanceData = students.map((student) => ({
                    id: student.id,
                    name: student.name,
                    ic_number: student.ic_number,
                    present: document.getElementById(`student-${student.id}`).checked,
                }));

                console.log("Attendance Data Submitted:", attendanceData);

                // Send data to the PHP backend
                fetch("submitAttendance.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(attendanceData),
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error("Failed to submit attendance");
                        }
                        return response.json();
                    })
                    .then((data) => {
                        alert(data.message);
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        alert("Failed to submit attendance.");
                    });
            });
        })
        .catch((error) => {
            console.error("Error fetching students:", error);
        });
});
