<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StudentUpdated;
use App\Models\Alert;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'city', 'department', 'nationality', 'age', 'gender', 'stratum', 'score', 'status', 'faculty', 'program'
    ];

    protected static function booted()
    {
        static::updated(function ($student) {
            $changes = $student->getChanges();
            if (!empty($changes)) {
                $message = 'Student information updated: ' . json_encode($changes);
                Alert::create([
                    'student_id' => $student->id,
                    'message' => $message,
                ]);

                // Enviar notificación por correo
                Notification::route('mail', 'admin@example.com')->notify(new StudentUpdated($message));
            }
        });
    }

    // Definir relaciones si existen
    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    // Otros métodos adicionales si es necesario
}
