<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Models\Alert;
use App\Mail\AlertMailable;
use Illuminate\Support\Facades\Auth;

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
            $original = $student->getOriginal();
            $excludedFields = ['updated_at', 'created_at'];
            $message = '<p>No changes detected</p>';

            if (!empty($changes)) {
                $message = "<table class='table table-warning table-bordered'>";
                $message .= "<thead><tr><th>Campo</th><th>Valor Anterior</th><th>Valor Nuevo</th></tr></thead>";
                $message .= "<tbody>";
                foreach ($changes as $field => $newValue) {
                    if (!in_array($field, $excludedFields)) {
                        $oldValue = $original[$field] ?? 'N/A';
                        $message .= "<tr><td>$field</td><td>$oldValue</td><td>$newValue</td></tr>";
                    }
                }
                $message .= "</tbody></table>";
            }

            Alert::create([
                'student_id' => $student->id,
                'message' => $message,
                'user_id' => Auth::id(),
            ]);

            // Enviar notificación por correo
            Mail::to('admin@example.com')->send(new AlertMailable($message));
        });
    }

    // Definir relaciones si existen
    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    // Otros métodos adicionales si es necesario
}
