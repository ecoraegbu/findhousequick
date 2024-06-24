CREATE TABLE messages (
  id INT NOT NULL AUTO_INCREMENT,
  sender_id INT NOT NULL,
  recipient_id INT NOT NULL,
  message_subject VARCHAR(255) NOT NULL,
  message_body TEXT NOT NULL,
  sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_read TINYINT(1) NOT NULL DEFAULT 0,
  is_deleted TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);
INSERT INTO messages (sender_id, recipient_id, message_subject, message_body) VALUES
  (1, 2, 'Meeting Reminder', 'Don''t forget our meeting tomorrow at 10:00 AM.'),
  (2, 1, 'Project Update', 'Just wanted to give you a quick update on the project. We are on track to meet the deadline.'),
  (3, 4, 'Dinner Invitation', 'Would you like to grab dinner tonight?'),
  (4, 3, 'Dinner Invitation - Yes!', 'Yes!  I''d love to.  What time are you thinking?'),
  (5, 6, 'Urgent Request', 'Please review the attached document ASAP.'),
  (6, 5, 'Urgent Request - Done', 'I reviewed the document.  What else can I do to help?'),
  (7, 8, 'Travel Confirmation', 'Your flight is confirmed.  See you at the airport.'),
  (8, 7, 'Travel Confirmation - Thanks!', 'Thanks for the confirmation.  I''m excited for the trip!'),
  (9, 10, 'Job Interview', 'We''d like to invite you for an interview for the open position.'),
  (10, 9, 'Job Interview - Accepted', 'Thank you!  I''d be happy to come in for an interview.');
/* SELECT * FROM messages
WHERE (sender_id = ? AND recipient_id = ?)
OR (sender_id = ? AND recipient_id = ?)
ORDER BY sent_at ASC;
 */

/* SELECT * FROM messages
WHERE recipient_id = ?
AND `read` = 0;
 */
/* SELECT * FROM messages
WHERE subject = ?; */
