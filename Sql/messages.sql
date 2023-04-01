CREATE TABLE messages (
  id INT NOT NULL AUTO_INCREMENT,
  sender_id INT NOT NULL,
  recipient_id INT NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `read` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);

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
