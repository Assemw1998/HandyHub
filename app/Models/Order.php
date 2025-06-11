<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_PENDING = 10;
    const STATUS_APPROVED_BY_ADMIN = 20;
    const STATUS_IN_PROGRESS = 30;
    const STATUS_COMPLETED = 40;
    const STATUS_CANCELLED_BY_ADMIN = 50;
    const STATUS_CANCELLED_BY_CUSTOMER = 60;
    const STATUS_CANCELLED_BY_HANDYMAN = 70;


    protected $fillable = [
        'service_id',
        'customer_id',
        'full_address',
        'note_description',
        'status',
        'created_by',
        'updated_by'
    ];

    public static function getStepperStatuses(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_APPROVED_BY_ADMIN => 'Approved',
            self::STATUS_IN_PROGRESS => 'In Progress',
            self::STATUS_COMPLETED => 'Completed',
        ];
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'Pending';
            case self::STATUS_APPROVED_BY_ADMIN:
                return 'Approved';
            case self::STATUS_IN_PROGRESS:
                return 'In Progress';
            case self::STATUS_COMPLETED:
                return 'Completed';
            case self::STATUS_CANCELLED_BY_ADMIN:
                return 'Cancelled by Admin';
            case self::STATUS_CANCELLED_BY_CUSTOMER:
                return 'Cancelled by Customer';
            case self::STATUS_CANCELLED_BY_HANDYMAN:
                return 'Cancelled by Handyman';
            default:
                return 'Unknown';
        }
    }

    public function getStatusBadgeClassAttribute()
    {
        return match ($this->status) {
            self::STATUS_COMPLETED => 'bg-success',
            self::STATUS_IN_PROGRESS => 'bg-warning',
            self::STATUS_PENDING => 'bg-secondary',
            self::STATUS_APPROVED_BY_ADMIN => 'bg-info',
            self::STATUS_CANCELLED_BY_ADMIN,
            self::STATUS_CANCELLED_BY_CUSTOMER,
            self::STATUS_CANCELLED_BY_HANDYMAN => 'bg-danger',
            default => 'bg-dark',
        };
    }


}
