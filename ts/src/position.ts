import {Cardinal} from './cardinal';

export class Position {
    constructor(private x: number, private y: number, private direction: Cardinal) {
    }

    move(): Position {
        let x = this.x;
        let y = this.y;

        switch (this.direction) {
            case Cardinal.East:
                x += 1;
                break;
            case Cardinal.West:
                x -= 1;
                break;
            case Cardinal.North:
                y += 1;
                break;
            case Cardinal.South:
                y -= 1;
                break;
        }

        return new Position(x, y, this.direction);
    }

    left(): Position {
        let direction: Cardinal;

        switch (this.direction) {
            case Cardinal.North:
                direction = Cardinal.West;
                break;
            case Cardinal.West:
                direction = Cardinal.South;
                break;
            case Cardinal.South:
                direction = Cardinal.East;
                break;
            case Cardinal.East:
                direction = Cardinal.North;
                break;
        }

        return new Position(this.x, this.y, direction);
    }

    right(): Position {
        let direction: Cardinal;

        switch (this.direction) {
            case Cardinal.North:
                direction = Cardinal.East;
                break;
            case Cardinal.East:
                direction = Cardinal.South;
                break;
            case Cardinal.South:
                direction = Cardinal.West;
                break;
            case Cardinal.West:
                direction = Cardinal.North;
                break;
        }

        return new Position(this.x, this.y, direction);
    }

    toJSON(): object {
        return {
            x: this.x,
            y: this.y,
            direction: this.direction
        };
    }

    toString(): string {
        return `${this.x} ${this.y} ${this.direction}`;
    }
}