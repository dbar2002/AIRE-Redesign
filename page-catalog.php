<?php
/**
 * Template Name: Course Catalog
 *
 * Long-form catalog template with a sticky TOC sidebar. Used by the
 * /catalog/ page. Content is hard-coded here rather than in the WP editor
 * because the catalog has strict structural requirements (BPPE-mandated
 * sections) and a hand-built TOC.
 *
 * To update for a new revision year, edit the constants below and the
 * section content inline.
 */

get_header();

$catalog_rev      = 'Rev. 1/2026';
$catalog_period   = 'January 1, 2026 – December 31, 2026';
$catalog_address  = '1275 El Camino Real, Menlo Park, CA 94025-4284';
$catalog_phone    = '(909) 833-0666';
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span class="sep">/</span>
		<span class="current">Course Catalog</span>
	</div>
</div>

<!-- Hero -->
<section class="page-hero">
	<div class="container">
		<?php aire_eyebrow( 'Required Disclosure' ); ?>
		<h1 class="page-h1">Course Catalog</h1>
		<p class="catalog-meta">
			<span><strong>Period:</strong> <?php echo esc_html( $catalog_period ); ?></span>
			<span class="catalog-meta-sep">·</span>
			<span><?php echo esc_html( $catalog_rev ); ?></span>
		</p>
	</div>
</section>

<!-- Catalog body with TOC sidebar -->
<section class="catalog-body">
	<div class="container catalog-grid">

		<!-- Sticky TOC -->
		<aside class="catalog-toc">
			<div class="toc-eyebrow">Contents</div>
			<nav class="toc-nav" aria-label="Catalog sections">
				<a href="#about">About AI Roboto EDU</a>
				<a href="#mission">Mission &amp; Objectives</a>
				<a href="#location">Instructional Location</a>
				<a href="#facilities">Facilities &amp; Equipment</a>
				<a href="#library">Library Resources</a>
				<a href="#transferability">Transferability of Credits</a>
				<a href="#admissions">Admissions Policies</a>
				<a href="#visa">Visa Services</a>
				<a href="#language">Language Proficiency</a>
				<a href="#accreditation">Accreditation Status</a>
				<a href="#strf">STRF Disclosure</a>
				<a href="#privacy">Privacy Act</a>
				<a href="#conduct">Student Conduct</a>
				<a href="#nondiscrimination">Nondiscrimination Policy</a>
				<a href="#academic-freedom">Academic Freedom</a>
				<a href="#harassment">Sexual Harassment</a>
				<a href="#cancel">Right to Cancel</a>
				<a href="#financial-aid">Financial Aid</a>
				<a href="#grades">Grades &amp; Satisfactory Progress</a>
				<a href="#attendance">Attendance Policy</a>
				<a href="#probation">Probation &amp; Dismissal</a>
				<a href="#loa">Leaves of Absence</a>
				<a href="#grievance">Grievance Procedures</a>
				<a href="#services">Student Services</a>
				<a href="#housing">Student Housing</a>
				<a href="#records">Records &amp; Transcripts</a>
				<a href="#licensure">Licensure</a>
				<a href="#tuition">Tuition &amp; Fees</a>
				<a href="#faculty">Faculty</a>
				<a href="#programs">Programs</a>
				<a href="#disclosures">Required Disclosures</a>
			</nav>
		</aside>

		<!-- Catalog content -->
		<article class="catalog-content">

			<section id="about">
				<h2>About AI Roboto EDU</h2>
				<p>AI Roboto EDU (AIRE) is a private institution approved to operate by the California Bureau for Private Postsecondary Education (Bureau). Approval to operate by the Bureau means that AIRE is compliant with the minimum state standards contained in the California Private Postsecondary Education Act of 2009 (as amended) and Division 7.5 of Title 5 of the California Code of Regulations. Approval does not mean that the Bureau endorses AIRE programs or that the Bureau's approval means the institution exceeds minimum state standards.</p>
				<p>AIRE will be an institution that builds educational programs designed to allow students to demonstrate they have acquired the competencies (levels of knowledge, skill, or ability) required for a particular certificate. AIRE students will have the opportunity to develop the skills in artificial intelligence and robotics to meet the workforce needs of the knowledge economy.</p>
				<p>AIRE will expose students to workforce experiences throughout their academic program through approaches such as work-based learning, professional networking, coaching services, and personality assessments.</p>
			</section>

			<section id="mission">
				<h2>Institutional Mission and Objectives</h2>
				<p>Be a learner-focused institution with educational and work-based programs (including hands-on experiences) that evolve to stay aligned with the workforce needs of the knowledge economy in the area of artificial intelligence and robotics.</p>
				<h3>Purpose</h3>
				<p>Help address the need for more workers with the education and hands-on work experience needed to fill the jobs in the knowledge economy specifically in the area of artificial intelligence and robotics.</p>
			</section>

			<section id="location">
				<h2>Instructional Location</h2>
				<p>AIRE delivers instruction online. AIRE does not have a physical campus for students. AIRE has an administrative office at:</p>
				<p><strong><?php echo esc_html( $catalog_address ); ?></strong></p>
				<h3>Hours of Operation</h3>
				<p>AIRE staff can be reached by email and phone Monday to Sunday, 7 AM to 7 PM MT. Students can schedule appointments a day in advance with AIRE personnel anytime if needed.</p>
				<p>AIRE will be closed for the following holidays: New Year's Day, Martin Luther King Jr. Day, Washington's Birthday, Cesar Chavez Day, Memorial Day, Independence Day, Labor Day, and Veterans Day.</p>
			</section>

			<section id="facilities">
				<h2>Description of the Facilities &amp; Type of Equipment Used for Instruction</h2>
				<p>AIRE will not have facilities where students will receive instruction. AIRE administration facilities for staff will be well-maintained, and maintain all valid permits required by any public agencies related to health and safety of the institution's facilities and equipment on file.</p>
				<p>The institution uses a learning management system that is available to students after they log in on www.airobotoedu.com. Course videos, Winspform, and Google Colab are embedded on the website for students to work on projects and for instructors to review and assess student work.</p>
				<h3>System Recommendations</h3>
				<ul>
					<li>Operating Systems: Mac OS 10.2 or higher, Windows 10 or higher</li>
					<li>8 GB RAM minimum</li>
					<li>1 TB hard drive or equivalent</li>
					<li>Web Browser: Chrome, Internet Explorer 8.0+, Firefox 3.0+, or Safari 4.0+</li>
					<li>Email: Outlook, Outlook Express, Mac Mail, Eudora, Entourage, Hotmail, Gmail, Yahoo</li>
					<li>Microsoft Word, Excel, PowerPoint recommended for optimal performance</li>
				</ul>
			</section>

			<section id="library">
				<h2>Library Resources</h2>
				<p>No formal library is needed to meet the instructional needs of the students. The acquisition of specialized knowledge and hands-on skills are the essential elements for completion of the programs offered. Students are provided with access to the LMS upon enrollment, which is where digital learning resources are maintained. Staff members are also available to provide research assistance.</p>
			</section>

			<section id="transferability" class="catalog-callout">
				<h2>Notice Concerning Transferability of Credits and Credentials Earned at Our Institution</h2>
				<p>The transferability of credits you earn at AI Roboto EDU is at the complete discretion of an institution to which you may seek to transfer. Acceptance of the certificate you earn in the programs is also at the complete discretion of the institution to which you may seek to transfer. If the certificate that you earn at this institution is not accepted at the institution to which you seek to transfer, you may be required to repeat some or all of your coursework at that institution. For this reason you should make certain that your attendance at this institution will meet your educational goals. This may include contacting an institution to which you may seek to transfer after attending AI Roboto EDU to determine if your certificate will transfer.</p>
			</section>

			<section id="admissions">
				<h2>Admissions Policies &amp; Recognition of Credits</h2>
				<p>AIRE requires a student to complete an application for admissions and submit an official transcript(s) from postsecondary institutions previously attended. There is no application fee. Applications are available online and accepted year-round.</p>
				<p>AIRE does not require standardized testing for admissions. Students are required to complete an Enrollment Agreement as part of their enrollment process.</p>
				<p>Students will be considered for admission without regard to race, creed, color, ethnicity, religion, background, native origin, physical disability, or sexual orientation. AIRE has not entered into an articulation or transfer agreement with any other college. AIRE will not admit students under the ability-to-benefit rules.</p>
				<h3>Admission Requirements</h3>
				<p>A bachelor's degree from an accredited institution. An accredited institution is one that is recognized by the United States Department of Education (ED) or the Council for Higher Education Accreditation (CHEA). Academic degrees obtained outside of the United States will be accepted if they have been evaluated by a nationally recognized credentialing service such as the National Association of Credential Evaluation Services (NACES).</p>
				<p>Candidates for admission are evaluated holistically based on their merits and potential to succeed at AIRE. Meeting basic admissions criteria does not guarantee acceptance.</p>
				<h3>Transfer Applicants</h3>
				<p>AIRE does not award credit for credits earned at other institutions. AIRE does not award credit for prior experiential learning, challenge examinations, or achievement tests.</p>
			</section>

			<section id="visa">
				<h2>Visa Related Services</h2>
				<p>This institution does not admit students from other countries, so no visa related services are offered.</p>
			</section>

			<section id="language">
				<h2>Language Proficiency &amp; Instruction</h2>
				<p>For a student whose high school or equivalent coursework was not completed in English, and for whom English was not a primary language, the student must attain a qualifying score of 97 on the Combined English Language Skills Assessment (CELSA) placement test.</p>
				<p>Instruction is given in English only. This institution does not provide ESL instruction.</p>
			</section>

			<section id="accreditation">
				<h2>Accreditation Status</h2>
				<p>This institution is not accredited by an accrediting agency recognized by the United States Department of Education. A student enrolled in an unaccredited institution is not eligible for federal financial aid.</p>
			</section>

			<section id="strf">
				<h2>Student Tuition Recovery Fund (STRF) Disclosure</h2>
				<p>The State of California established the Student Tuition Recovery Fund (STRF) to relieve or mitigate economic loss suffered by a student in an educational program at a qualifying institution, who is or was a California resident while enrolled, or was enrolled in a residency program, if the student enrolled in the institution, prepaid tuition, and suffered an economic loss. Unless relieved of the obligation to do so, you must pay the state-imposed assessment for the STRF, or it must be paid on your behalf, if you are a student in an educational program, who is a California resident, or are enrolled in a residency program, and prepay all or part of your tuition.</p>
				<p>You are not eligible for protection from the STRF and you are not required to pay the STRF assessment, if you are not a California resident, or are not enrolled in a residency program.</p>
				<p>It is important that you keep copies of your enrollment agreement, financial aid documents, receipts, or any other information that documents the amount paid to the school. Questions regarding the STRF may be directed to the Bureau for Private Postsecondary Education, 1747 N. Market Blvd., Suite 225, Sacramento, CA 95834, (916) 574-8900 or (888) 370-7589.</p>
				<h3>STRF Eligibility</h3>
				<p>To be eligible for STRF, you must be a California resident or enrolled in a residency program, prepaid tuition, paid or deemed to have paid the STRF assessment, and suffered an economic loss as a result of any of the following:</p>
				<ol>
					<li>The institution, a location, or an educational program was closed or discontinued, and you did not choose to participate in or complete an approved teach-out plan.</li>
					<li>You were enrolled at the institution within the 120-day period before closure of the institution or location, or within 120 days before the program was discontinued.</li>
					<li>You were enrolled more than 120 days before closure in a program the Bureau determined had a significant decline in quality or value.</li>
					<li>The institution has been ordered to pay a refund by the Bureau but has failed to do so.</li>
					<li>The institution has failed to pay or reimburse loan proceeds under a federal student loan program, or has failed to pay or reimburse proceeds received in excess of tuition and other costs.</li>
					<li>You have been awarded restitution, a refund, or other monetary award by an arbitrator or court but have been unable to collect from the institution.</li>
					<li>You sought legal counsel that resulted in the cancellation of one or more of your student loans and have an invoice for services rendered and evidence of the cancellation.</li>
				</ol>
				<p>To qualify for STRF reimbursement, the application must be received within four (4) years from the date of the action or event that made the student eligible. No claim can be paid to any student without a social security number or a taxpayer identification number.</p>
			</section>

			<section id="privacy">
				<h2>Privacy Act</h2>
				<p>It is this institution's intent to carefully follow the rules applicable under the Family Education Rights and Privacy Act. It is our intent to protect the privacy of a student's financial, academic, and other school records. We will not release such information to any individual without having first received the student's written request to do so, or unless otherwise required by law.</p>
			</section>

			<section id="conduct">
				<h2>Student Conduct</h2>
				<p>Students are expected to behave professionally and respectfully at all times. Students are subject to dismissal for any inappropriate or unethical conduct or for any act of academic dishonesty.</p>
				<p>A student may be dismissed from school for reasons including, but not limited to:</p>
				<ul>
					<li>Coming to class in an intoxicated or drugged state</li>
					<li>Possession of drugs or alcohol on campus</li>
					<li>Possession of a weapon on campus</li>
					<li>Behavior creating a safety hazard to other persons</li>
					<li>Disobedient or disrespectful behavior to other students, an administrator, or instructor</li>
					<li>Stealing or damaging the property of another</li>
				</ul>
				<p>Disciplinary action will be determined by the Chief Executive Officer of this institution within 10 days after meeting with both the chair of the department in which the student is enrolled and the student in question.</p>
			</section>

			<section id="nondiscrimination">
				<h2>Nondiscrimination Policy</h2>
				<p>This institution is committed to providing equal opportunities to all applicants to programs and to all applicants for employment. No discrimination shall occur in any program or activity of this institution, including activities related to the solicitation of students or employees, on the basis of race, color, religion, religious beliefs, national origin, sex, sexual orientation, marital status, pregnancy, age, disability, veteran's status, or any other classification that precludes a person from consideration as an individual.</p>
			</section>

			<section id="academic-freedom">
				<h2>Academic Freedom</h2>
				<p>AI Roboto EDU is committed to assuring full academic freedom to all faculty. The college encourages its faculty members to exercise their individual judgments regarding the content of the assigned courses, organization of topics, and instructional methods, providing only that these judgments are made within the context of the course descriptions as currently published, and that the instructional methods are those officially sanctioned by the institution.</p>
				<p>AI Roboto EDU encourages instructors and students to engage in discussion and dialog. Students and faculty members alike are encouraged to freely express views, however controversial, as long as they believe it would advance understanding in their specialized discipline.</p>
			</section>

			<section id="harassment">
				<h2>Sexual Harassment</h2>
				<p>This institution is committed to providing a work environment that is free of discrimination, intimidation, and harassment. No one associated with this institution may engage in verbal abuse of a sexual nature; use sexually degrading or graphic words to describe an individual or an individual's body; or display sexually suggestive objects or pictures at any facility or other venue associated with this institution.</p>
			</section>

			<section id="cancel">
				<h2>Student's Right to Cancel</h2>
				<p>The student has the right to cancel the enrollment agreement and obtain a refund of charges paid through attendance at the first class session, or the seventh day after enrollment, whichever is later. A notice of cancellation shall be in writing and submitted to the school administrative office. Cancellation or withdrawal is effective on the date written notice is sent to the school administrative office at <?php echo esc_html( $catalog_address ); ?> or by email to contact@airobotoedu.com.</p>
				<p>The institution shall refund 100 percent of the amount paid for institutional charges, less a reasonable registration fee. The institution shall pay or credit refunds within 45 days of a student's cancellation or withdrawal.</p>
				<h3>Refund Policy</h3>
				<p>If the student cancels an enrollment agreement or withdraws during a period of attendance, the refund policy for students who have completed 60 percent or less of the period of attendance shall be a pro rata refund. The amount owed equals the daily charge for the program (total institutional charge, divided by the number of days or hours in the program), multiplied by the number of days the student attended, or was scheduled to attend, prior to withdrawal.</p>
			</section>

			<section id="financial-aid">
				<h2>Financial Aid</h2>
				<p>This institution does not participate in any federal or state financial aid programs. A student enrolled in an unaccredited institution is not eligible for federal financial aid programs.</p>
				<p>The institution does provide financial aid directly to its students in the form of a monthly payment plan. No interest is charged; however, late fees apply for payments two or more days delinquent. All financial arrangements must be made before the beginning of classes.</p>
			</section>

			<section id="grades">
				<h2>Grades and Standards for Student Achievement</h2>
				<h3>Competency-Based Education</h3>
				<p>AIRE is an online institution with competency-based certificate programs. AIRE measures what a student knows and can do, not how much time is spent in a classroom. Instructors engage in regular and substantive interaction with every student and respond within 10 days of receipt of student lessons or projects.</p>
				<h3>Grading System</h3>
				<table class="catalog-table">
					<thead>
						<tr><th>Grade</th><th>Meaning</th></tr>
					</thead>
					<tbody>
						<tr><td><strong>CR</strong></td><td>Credit — Student fulfills the course requirements (equivalent of B or better) and receives academic credit toward the certificate.</td></tr>
						<tr><td><strong>NC</strong></td><td>No Credit — Student does not fulfill the course requirements and will not receive academic credit.</td></tr>
						<tr><td><strong>T</strong></td><td>Transfer — AIRE has accepted student credits from another institution.</td></tr>
						<tr><td><strong>W</strong></td><td>Withdrawn — Student was withdrawn from the institution or course before term completion.</td></tr>
						<tr><td><strong>D</strong></td><td>Dropped — Course was dropped from term registration; not included in attempted units.</td></tr>
						<tr><td><strong>I</strong></td><td>Incomplete — Arrangement to complete the course at a later date.</td></tr>
					</tbody>
				</table>
			</section>

			<section id="attendance">
				<h2>Attendance Policy</h2>
				<p>Students are expected to sign into the learning management system for synchronous instruction and participate as required in online sessions at the scheduled day and time. For asynchronous instruction, students are expected to sign in within the time specified by the instructor.</p>
				<p>AIRE monitors the following to determine that a student has met the intent of the attendance policy:</p>
				<ul>
					<li>Student submission of an academic assignment</li>
					<li>Student submission of an exam</li>
					<li>Documented student participation in an interactive tutorial or computer-assisted instruction</li>
					<li>A posting by the student showing participation in an assigned online study group</li>
					<li>A posting by the student in a discussion forum about academic matters</li>
					<li>An email from the student or other documentation of student-initiated contact with a faculty member about an academic subject</li>
				</ul>
				<p>Logging into a course and clicking on resources will not count as having participated. Online students who do not engage through one of the activities for seven consecutive (7) calendar days will be withdrawn from the program.</p>
			</section>

			<section id="probation">
				<h2>Academic Probation and Dismissal Policies</h2>
				<p>The Chief Academic Officer may place a student on academic probation if the student is not making satisfactory academic progress. The student's academic progress will be monitored at the end of each module as the grades are posted. Should the student's pass/fail percentage fall below that required for graduation, a student may be placed on academic probation.</p>
				<p>After the completion of the current module, the student will have two additional modules to bring his or her pass/fail percentage up to or in excess of the minimum standard of the institution. Thereafter, failure to achieve satisfactory academic progress may result in dismissal from the program.</p>
			</section>

			<section id="loa">
				<h2>Leaves of Absence</h2>
				<p>It is the policy of the school to not grant a Leave of Absence to students.</p>
			</section>

			<section id="grievance">
				<h2>Student Grievance Procedures — Student Rights</h2>
				<p>Most problems or complaints can be resolved through a personal meeting with the student's instructor or a counselor. If this does not resolve the matter, the student may submit a written complaint to the main campus at <?php echo esc_html( $catalog_address ); ?>.</p>
				<p>The written complaint must contain a statement of the nature of the problem, the date the problem occurred, the names of the individuals involved, copies of relevant documents, evidence demonstrating that the institution's complaint procedure was properly followed, and the student's signature. The student can expect to receive a written response within ten business days.</p>
				<p>Continued unresolved complaints may be directed to:</p>
				<address class="catalog-address">
					Bureau for Private Postsecondary Education<br />
					P.O. Box 980818<br />
					West Sacramento, CA 95798-0818<br />
					Phone: (916) 574-8900<br />
					Web: <a href="https://www.bppe.ca.gov" target="_blank" rel="noopener">www.bppe.ca.gov</a>
				</address>
			</section>

			<section id="services">
				<h2>Student Services</h2>
				<p>This institution does not provide airport reception services, housing assistance, or other services. This institution maintains a focus on the delivery of educational services. Should a student encounter personal problems which interfere with his or her ability to complete coursework, this institution will provide assistance in identifying appropriate professional assistance in the student's local community but does not offer personal counseling assistance.</p>
				<h3>Placement Services</h3>
				<p>This institution does not represent to the public, in any manner, or by any means, that it offers job placement assistance.</p>
			</section>

			<section id="housing">
				<h2>Student Housing</h2>
				<p>This institution has no responsibility to find or assist a student in funding housing. This institution does not operate dormitories or other housing facilities. Housing in the immediate area is available in two-story walkup and garden apartments. Monthly rent for a one-bedroom unit is approximately $1,500 a month.</p>
			</section>

			<section id="records">
				<h2>Student Records and Transcripts</h2>
				<p>Student records for all students are kept for five years. Transcripts are kept permanently. Students may inspect and review their educational records by submitting a written request identifying the specific information to be reviewed.</p>
				<p>Each student's file will contain the signed enrollment agreement, school performance fact sheet, diploma granted, transcript of grades earned, high school diploma or GED, copies of all documents signed by the student, leave of absence documents, financial ledger, refund information as applicable, and complaints received from the student or student advisories related to academic progress. Transcripts will only be released to the student upon receipt of a written request bearing the student's live signature.</p>
			</section>

			<section id="licensure">
				<h2>Professions — Requirements for Eligibility for Licensure</h2>
				<p>None of the programs offered by the institution leads to licensure or certification.</p>
			</section>

			<section id="tuition">
				<h2>Charges: Tuition &amp; Fees</h2>
				<p class="catalog-fineprint">All fees are subject to change from time to time, without notice.</p>
				<table class="catalog-table catalog-tuition-table">
					<thead>
						<tr>
							<th>Program</th>
							<th>Tuition</th>
							<th>Registration Fee</th>
							<th>STRF</th>
							<th>Books &amp; Materials</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Advanced Robotics</td>
							<td>$8,000</td>
							<td>$0.00</td>
							<td>$0.00</td>
							<td>$0.00</td>
							<td><strong>$8,000</strong></td>
						</tr>
						<tr>
							<td>Autonomous Driving</td>
							<td>$12,000</td>
							<td>$0.00</td>
							<td>$0.00</td>
							<td>$0.00</td>
							<td><strong>$12,000</strong></td>
						</tr>
						<tr>
							<td>Electric Vehicle</td>
							<td>$12,000</td>
							<td>$0.00</td>
							<td>$0.00</td>
							<td>$0.00</td>
							<td><strong>$12,000</strong></td>
						</tr>
						<tr>
							<td>Machine Learning &amp; Artificial Intelligence</td>
							<td>$8,500</td>
							<td>$0.00</td>
							<td>$0.00</td>
							<td>$0.00</td>
							<td><strong>$8,500</strong></td>
						</tr>
					</tbody>
				</table>
				<p class="catalog-fineprint">Registration Fee, STRF, and Books &amp; Materials are non-refundable. Books &amp; Materials are refundable during the cancellation period only. STRF assessment: $0.00 per $1,000 of institutional fees.</p>
				<h3>Other Fees</h3>
				<ul>
					<li>$35 charge for all declined scheduled credit card payments</li>
					<li>Educational services may be withheld from a student whose payment is more than 10 days late</li>
					<li>Transcript copies are available upon advance payment of $25.00 for two copies</li>
				</ul>
			</section>

			<section id="faculty">
				<h2>Faculty</h2>
				<table class="catalog-table">
					<thead>
						<tr><th>Name</th><th>Degree &amp; Major</th><th>Institution</th><th>Teaches</th></tr>
					</thead>
					<tbody>
						<tr>
							<td>Qiangyang Liu</td>
							<td>M.S., Electrical Engineering</td>
							<td>California State University at Los Angeles</td>
							<td>Electric Vehicles &amp; Advanced Robotics</td>
						</tr>
						<tr>
							<td>Chen Lin</td>
							<td>Ph.D., Computer Science</td>
							<td>UCLA</td>
							<td>Autonomous Driving</td>
						</tr>
						<tr>
							<td>Michael Barnathan</td>
							<td>Ph.D., Computer &amp; Information Sciences</td>
							<td>Temple University</td>
							<td>Artificial Intelligence &amp; Machine Learning</td>
						</tr>
					</tbody>
				</table>
			</section>

			<section id="programs">
				<h2>Programs</h2>

				<article class="catalog-program">
					<h3>Advanced Robotics</h3>
					<div class="catalog-program-stats">
						<span><strong>96 clock hours</strong> · 10 weeks</span>
						<span><strong>$8,000</strong> tuition</span>
						<span>SOC 11-3021</span>
					</div>
					<p>This program introduces students to the fundamentals and advanced technologies regarding robotics, including robotic system design and development, robot sensing and perception, robot decision-making, robot motion planning and trajectory generation, robot control, concurrency, and real-time systems. As an application-oriented program, students develop hands-on skill sets on industrial robots and aerial robots, culminating in a capstone project.</p>
					<h4>Objectives</h4>
					<p>Upon successful completion, students will be able to: understand concepts in robotics and automation; apply problem-oriented sensing and actuation system design; understand sensing fusion methods and conventional robot control strategies; navigate the entire pipeline using robots to solve real-world applications; understand robot skill learning techniques; and understand prevalent industrial robots.</p>
					<h4>Graduation Requirement</h4>
					<p>Complete all prescribed portions of the program and earn a minimum grade of "B" and a grade of "pass" on the Class Participation Rubric and the Project Scoring Rubric. No externship or internship required. A final exam is required.</p>
					<h4>Modules</h4>
					<table class="catalog-table catalog-module-table">
						<thead><tr><th>Module</th><th>Topic</th><th>Hours</th></tr></thead>
						<tbody>
							<tr><td>1</td><td>Image Processing and Recognition System</td><td>26 (wk 1–3)</td></tr>
							<tr><td>2</td><td>Robotic Operating System</td><td>28 (wk 3–5)</td></tr>
							<tr><td>3</td><td>Practical Courses for Robotics</td><td>24 (wk 6–8)</td></tr>
							<tr><td>4</td><td>Introduction to Industrial Design</td><td>3 (wk 9)</td></tr>
							<tr><td>5</td><td>Common Skill Training</td><td>3 (wk 9)</td></tr>
							<tr><td>6</td><td>Advanced Robotics Capstone Project</td><td>12 (wk 8–10)</td></tr>
						</tbody>
					</table>
				</article>

				<article class="catalog-program">
					<h3>Autonomous Driving</h3>
					<div class="catalog-program-stats">
						<span><strong>96 clock hours</strong> · 10 weeks</span>
						<span><strong>$12,000</strong> tuition</span>
						<span>SOC 11-3021</span>
					</div>
					<p>This program provides students with the opportunity to acquire the knowledge, skills, certificates, and experiences to compete for positions as engineers in the autonomous driving industry. Students are introduced to image processing and recognition, robotic systems including localization, operation, reinforcement learning for decision, and navigation, and then take practical courses to become familiar with robotic system tools.</p>
					<h4>Objectives</h4>
					<p>Upon successful completion, students will be able to: completely understand the key components of an autonomous driving car; understand the key tools to design and repair an autonomous driving car; understand deep learning and reinforcement learning; understand planning and navigation algorithms; understand the structure and function of the intelligent system; and design the core system of an autonomous driving car.</p>
					<h4>Graduation Requirement</h4>
					<p>Complete all prescribed portions of the program and earn a minimum grade of "B" and a grade of "pass" on the Class Participation Rubric and the Project Scoring Rubric. No externship or internship required. A final exam is required.</p>
					<h4>Modules</h4>
					<table class="catalog-table catalog-module-table">
						<thead><tr><th>Module</th><th>Topic</th><th>Hours</th></tr></thead>
						<tbody>
							<tr><td>1</td><td>General Introduction to Autonomous Driving</td><td>6 (wk 1)</td></tr>
							<tr><td>2</td><td>Image Processing and Recognition System</td><td>26 (wk 2–4)</td></tr>
							<tr><td>3</td><td>Robotic Operating System of Autonomous Driving</td><td>26 (wk 4–6)</td></tr>
							<tr><td>4</td><td>Practical Courses of AI Tools for Autonomous Driving</td><td>20 (wk 7–8)</td></tr>
							<tr><td>5</td><td>Introduction to Industrial Design</td><td>3 (wk 9)</td></tr>
							<tr><td>6</td><td>Common Skills Training</td><td>3 (wk 9)</td></tr>
							<tr><td>7</td><td>Autonomous Driving Capstone Project</td><td>12 (wk 8–10)</td></tr>
						</tbody>
					</table>
				</article>

				<article class="catalog-program">
					<h3>Electric Vehicle</h3>
					<div class="catalog-program-stats">
						<span><strong>72 clock hours</strong> · 10 weeks</span>
						<span><strong>$12,000</strong> tuition</span>
						<span>SOC 11-3021</span>
					</div>
					<p>This program provides students with the opportunity to understand electric vehicle architecture and domain functionalities. Students learn automotive development history, market trends, systematic design of vehicle domains (body, battery, chassis, powertrain, thermal, infotainment, telematics), industrial design, and tools including PREEvision, Vector tools, MATLAB, LabVIEW, ANSYS, and Maxwell 3D.</p>
					<h4>Objectives</h4>
					<p>Upon successful completion, students will be able to: comprehensively understand the key systems of an electric vehicle; understand electric vehicle codes and standards; fully understand in-vehicle networking fundamentals; understand E/E architecture design and development; design and integrate core systems of an electric vehicle; apply industrial design knowledge; and apply hands-on project experience in electric vehicle design.</p>
					<h4>Graduation Requirement</h4>
					<p>Complete all prescribed portions of the program and earn a minimum grade of "B" and a grade of "pass" on the Class Participation Rubric and the Project Scoring Rubric. No externship or internship required. A final exam is required.</p>
					<h4>Modules</h4>
					<table class="catalog-table catalog-module-table">
						<thead><tr><th>Module</th><th>Topic</th><th>Hours</th></tr></thead>
						<tbody>
							<tr><td>1</td><td>General Introduction to Electric Vehicle</td><td>4 (wk 1)</td></tr>
							<tr><td>2</td><td>Automotive Fundamentals</td><td>18 (wk 1–3)</td></tr>
							<tr><td>3</td><td>Introduction to Electric Vehicle System Design</td><td>24 (wk 4–6)</td></tr>
							<tr><td>4</td><td>Introduction to Automotive Tools</td><td>8 (wk 7)</td></tr>
							<tr><td>5</td><td>Introduction to Industrial Design</td><td>3 (wk 8)</td></tr>
							<tr><td>6</td><td>Common Skills Training</td><td>3 (wk 9)</td></tr>
							<tr><td>7</td><td>Electric Vehicle Capstone Project</td><td>12 (wk 8–10)</td></tr>
						</tbody>
					</table>
				</article>

				<article class="catalog-program">
					<h3>Machine Learning &amp; Artificial Intelligence</h3>
					<div class="catalog-program-stats">
						<span><strong>88 clock hours</strong> · 10 weeks</span>
						<span><strong>$8,500</strong> tuition</span>
						<span>SOC 11-3021</span>
					</div>
					<p>This program provides students with the opportunity to obtain a basic understanding of the fundamentals of Artificial Intelligence both theoretically and practically. Students learn probability theory and statistics, machine learning and deep learning fundamentals, and then choose one or several specialties — natural language processing, speech recognition, or computer vision — to deepen their knowledge.</p>
					<h4>Objectives</h4>
					<p>Upon successful completion, students will be able to: comprehensively understand the mathematical foundation of AI; understand the concept of different learning algorithms; proficiently apply AI techniques to real-world problems; and earn one specialty and project experience in the AI field.</p>
					<h4>Graduation Requirement</h4>
					<p>Complete all prescribed portions of the program and earn a minimum grade of "B" and a grade of "pass" on the Class Participation Rubric and the Project Scoring Rubric. No externship or internship required. A final exam is required.</p>
					<h4>Modules</h4>
					<table class="catalog-table catalog-module-table">
						<thead><tr><th>Module</th><th>Topic</th><th>Hours</th></tr></thead>
						<tbody>
							<tr><td>1</td><td>Introduction to Algebra &amp; Statistics</td><td>18 (wk 1–2)</td></tr>
							<tr><td>2</td><td>Introduction to Data Structure &amp; Algorithm</td><td>21 (wk 3–5)</td></tr>
							<tr><td>3</td><td>Introduction to Machine Learning</td><td>18 (wk 5–7)</td></tr>
							<tr><td>4</td><td>Application of AI</td><td>16 (wk 8–9)</td></tr>
							<tr><td>5</td><td>Common Skills Training</td><td>3 (wk 10)</td></tr>
							<tr><td>6</td><td>AI Capstone Project</td><td>12 (wk 8–10)</td></tr>
						</tbody>
					</table>
				</article>
			</section>

			<section id="disclosures">
				<h2>Required Disclosures</h2>
				<p>The policy of this institution is to update the official school catalog annually, in January of each year. Annual updates may be made by the use of supplements or inserts accompanying the catalog.</p>
				<p>This institution makes its current catalog and current program brochures available to the public at no charge. Individuals who wish to obtain a copy can make arrangements by calling the school's office.</p>
				<p>This institution is a private institution. The school was granted institutional approval to operate by the Bureau of Private Post Secondary Education (BPPE) and the California Department of Consumer Affairs (DCA). The Bureau's approval means compliance with state standards set forth in CEC and 5, CCR. This approval does <strong>not</strong> mean that the institution or its educational programs are endorsed or recommended by the state or by the Bureau, nor does the approval to operate indicate that the institution exceeds minimum state standards.</p>
				<p>This institution has not had a pending petition in bankruptcy, is not operating as a debtor in possession, and has not filed a bankruptcy petition within the preceding five years, nor has it had a petition in bankruptcy filed against it within the preceding five years that resulted in reorganization under Chapter 11 of the United States Bankruptcy Code.</p>
				<p>As a prospective student, you are encouraged to review this catalog prior to signing an enrollment agreement. You are also encouraged to review the School Performance Fact Sheet, which must be provided to you prior to signing an enrollment agreement.</p>
				<p>If a student obtains a loan to pay for an educational program, the student will have the responsibility to repay the full amount of the loan plus interest, less the amount of any refund. If the student has received federal student financial aid funds, the student is entitled to a refund of the money not paid from federal student financial aid program funds.</p>
				<p>Any questions a student may have regarding this catalog that have not been satisfactorily answered by the institution may be directed to the Bureau for Private Postsecondary Education:</p>
				<address class="catalog-address">
					Bureau for Private Postsecondary Education<br />
					1747 North Market, Suite 225<br />
					Sacramento, CA 95834<br />
					P.O. Box 980818, West Sacramento, CA 95798<br />
					Web: <a href="https://www.bppe.ca.gov" target="_blank" rel="noopener">www.bppe.ca.gov</a><br />
					Toll-free: (888) 370-7589<br />
					Fax: (916) 263-1897
				</address>
				<p>A student or any member of the public may file a complaint about this institution with the Bureau for Private Postsecondary Education by calling (888) 370-7589 or by completing a complaint form, which can be obtained on the Bureau's website www.bppe.ca.gov.</p>
				<p>The Office of Student Assistance and Relief is available to support prospective students, current students, or past students of private postsecondary educational institutions. The office may be reached toll-free at (888) 370-7589 or by visiting www.bppe.ca.gov.</p>
			</section>

		</article>
	</div>
</section>

<?php get_footer(); ?>
