import mysql.connector

class Notifications:
    def __init__(self, db):
        self.db = db

    def send_notification(self, user_id, message):
        cursor = self.db.cursor()
        cursor.execute("INSERT INTO notifications (user_id, message) VALUES (%s, %s)", (user_id, message))
        self.db.commit()

    def mark_as_read(self, notification_id):
        cursor = self.db.cursor()
        cursor.execute("UPDATE notifications SET `read` = 1 WHERE id = %s", (notification_id,))
        self.db.commit()

    def get_unread_notifications(self, user_id):
        cursor = self.db.cursor(dictionary=True)
        cursor.execute("SELECT * FROM notifications WHERE user_id = %s AND `read` = 0", (user_id,))
        return cursor.fetchall()

    def delete_notification(self, notification_id):
        cursor = self.db.cursor()
        cursor.execute("DELETE FROM notifications WHERE id = %s", (notification_id,))
        self.db.commit()

    def get_notification_count(self, user_id):
        cursor = self.db.cursor()
        cursor.execute("SELECT COUNT(*) as count FROM notifications WHERE user_id = %s", (user_id,))
        result = cursor.fetchone()
        return result['count']

    def delete_old_notifications(self, days):
        cursor = self.db.cursor()
        cutoff = datetime.now() - timedelta(days=days)
        cursor.execute("DELETE FROM notifications WHERE created_at < %s", (cutoff,))
        self.db.commit()
