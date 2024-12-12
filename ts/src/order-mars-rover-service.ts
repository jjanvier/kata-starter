import {Position} from './position';
import {Instruction, Order} from './order';

export class OrderMarsRoverService {
    private positions: Position[] = [];

    order(...orders: Order[]): void {
        orders.forEach((order, index) => {
            this.positions[index] = this.followInstructionsFromPosition(order.instructions, order.initialPosition);
        });
    }

    currentPositions(): Position[] {
        return this.positions;
    }

    private followInstructionsFromPosition(instructions: Instruction[], position: Position): Position {
        instructions.forEach(instruction => {
            switch (instruction) {
                case Instruction.Move:
                    position = position.move();
                    break;
                case Instruction.Left:
                    position = position.left();
                    break;
                case Instruction.Right:
                    position = position.right();
                    break;
            }
        });

        return position;
    }
}