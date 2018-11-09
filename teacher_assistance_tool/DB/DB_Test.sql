CREATE TABLE students (
    std_id int NOT NULL AUTO_INCREMENT,
    std_name varchar(255) NOT NULL,
    ssn_id int,
    sl_no int,
    PRIMARY KEY (std_id),
    FOREIGN KEY (ssn_id) REFERENCES session(ssn_id),
    FOREIGN KEY (sl_no) REFERENCES department(sl_no)
);

CREATE TABLE results (
	rsl_id int NOT NULL AUTO_INCREMENT,
	ssn_crs_id int,	
    std_id int,
    PRIMARY KEY (rsl_id),
    FOREIGN KEY (ssn_crs_id) REFERENCES session_courses(ssn_crs_id),
    FOREIGN KEY (std_id) REFERENCES students(std_id)
);

ALTER TABLE session_courses ADD sl_no INT NOT NULL DEFAULT 0;
ALTER TABLE session_courses ADD CONSTRAINT fk_sl_no FOREIGN KEY (sl_no) REFERENCES department(sl_no);

SELECT * FROM courses INNER JOIN session_courses ON courses.crs_id=session_courses.crs_id where ssn_id = '$_REQUEST[id]';


SELECT * FROM courses INNER JOIN session_courses ON courses.crs_id=session_courses.crs_id where ssn_id = '$_REQUEST[id]';

select s.name "Student", c.name "Course"
from student s, bridge b, course c
where b.sid = s.sid and b.cid = c.cid 

SELECT * FROM session sn, students sd,  department dt WHERE sd.ssn_id = sn.ssn_id and st.sl_no = dp.sl_no and st.std_id = 1; 

SELECT * FROM courses cr, session_courses sc, department dt WHERE cr.crs_id = sc.crs_id and dt.sl_no = sc.sl_no and ssn_id = '$_REQUEST[id]'

SELECT * FROM courses INNER JOIN session_courses ON courses.crs_id=session_courses.crs_id where ssn_id = '$_REQUEST[id]'

TRUNCATE TABLE

SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE table_name;
SET FOREIGN_KEY_CHECKS=1;



