# 🎓 College Voting System

### 🛠️ Project Overview
The **College Voting System** is a secure and user-friendly web application designed to streamline campus elections. This platform enables students to vote electronically, ensuring transparency, accuracy, and fairness in college elections.

---

### 🔄 Tech Stack
- **Frontend:**  
  - 🔢 **HTML** – Structure the web pages.  
  - 🌟 **CSS** – Enhance UI/UX with attractive styling.  
  - 🌐 **JavaScript** – Add interactivity and live updates.  
- **Backend:**  
  - 🛠️ **PHP** – Handle server-side operations.  
- **Database:**  
  - 🏢 **MySQL** – Store user data, votes, and results.

---

### 📝 Features
- 👥 **Admin Panel:**
  - Manage candidates and monitor the voting process.
  - View detailed reports and analytics.
  - Announce winners post-election.
- 📉 **Student Panel:**
  - Secure login via college ID/email.
  - One-click voting system with instant feedback.
- 🌟 **Real-time Results:**
  - Graphical visualization of votes.
  - Live updates of voting statistics.
- 🔒 **Security Measures:**
  - OTP/email verification.
  - One-person, one-vote enforcement.

---

### 🌐 Workflow
1. **Login & Authentication:** 🔐  
   - Students log in securely using unique credentials.  
   - Admins manage voting events and access backend controls.  
2. **Candidate Registration:** 🏛  
   - Admin registers candidates for various positions.  
3. **Voting Process:** 🗳️  
   - Students cast votes in a seamless interface.  
   - The system prevents duplicate submissions.  
4. **Result Declaration:** 🏆  
   - Votes are counted, and results are published dynamically.

---

### 📃 Database Structure
- **Users Table:**  
  - `user_id, name, email, password, role`  
- **Candidates Table:**  
  - `candidate_id, name, position, description`  
- **Votes Table:**  
  - `vote_id, user_id, candidate_id, timestamp`  
